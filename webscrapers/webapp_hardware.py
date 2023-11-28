from bs4 import BeautifulSoup
import requests
import mysql.connector
import urllib.request

# List of URLs to scrape elements with the specified class and tag
urls = [
    {
        "url": "https://www.speedcomputers.biz/category/komponenti-za-kompjutri/ssd/",
        "name_tag": "a",
        "name_class": "uk-product-name",
        "price_tag": "span",
        "price_class": "price tm-price uk-price",
        "img_tag": "img",
        "img_class": "uk-product-image uk-responsive-width uk-responsive-height",  # Add the image class
        "type": "SSD"
    },
    {
        "url": "https://www.speedcomputers.biz/category/komponenti-za-kompjutri/procesori/",
        "name_tag": "a",
        "name_class": "uk-product-name",
        "price_tag": "span",
        "price_class": "price tm-price uk-price",
        "img_tag": "img",
        "img_class": "uk-product-image uk-responsive-width uk-responsive-height",  # Add the image class
        "type": "CPU"
    },
    {
        "url": "https://www.speedcomputers.biz/category/komponenti-za-kompjutri/video-karti/",
        "name_tag": "a",
        "name_class": "uk-product-name",
        "price_tag": "span",
        "price_class": "price tm-price uk-price",
        "img_tag": "img",
        "img_class": "uk-product-image uk-responsive-width uk-responsive-height",  # Add the image class
        "type": "GPU"
    }
]

try:
    # Connection to the database
    db = mysql.connector.connect(
        host="sql11.freemysqlhosting.net",
        user="sql11665896",
        password="Mfc5Y2lNTe",
        database="sql11665896"
        
    )

    cursor = db.cursor()

    for url_data in urls:
        url = url_data["url"]
        name_tag = url_data["name_tag"]
        name_class = url_data["name_class"]
        price_tag = url_data["price_tag"]
        price_class = url_data["price_class"]
        img_tag = url_data.get("img_tag")  # Get the image tag (optional)
        img_class = url_data.get("img_class")  # Get the image class (optional)
        product_type = url_data["type"]

        # Use urllib to get the page content
        with urllib.request.urlopen(url) as response:
            page_content = response.read()

        # Check if the page content is not empty
        if page_content:
            # Locate all elements with the specified tag and class for "name" and "price"
            soup = BeautifulSoup(page_content, 'html.parser')
            name_elements = soup.find_all(name_tag, class_=name_class)
            price_elements = soup.find_all(price_tag, class_=price_class)

            if img_tag and img_class:
                img_elements = soup.find_all(img_tag, class_=img_class)
            else:
                img_elements = []

            if name_elements and price_elements and len(name_elements) == len(price_elements):
                for name_element, price_element, img_element in zip(name_elements, price_elements, img_elements):
                    name_value = name_element.text.strip()
                    price_value = price_element.text.strip()
                       
                    # Use urllib to get the entire img tag
                    img_tag_html = str(img_element)
                    
                    # Check if a record with the same name already exists
                    select_query = "SELECT id, price, photo FROM hardware WHERE name = %s"
                    cursor.execute(select_query, (name_value,))
                    existing_record = cursor.fetchone()

                    if existing_record:
                        existing_id, existing_price, existing_photo = existing_record
                        if price_value != existing_price or img_tag_html != existing_photo:
                            # Price or photo has changed; update the record
                            update_query = "UPDATE hardware SET price = %s, photo = %s WHERE name = %s"
                            cursor.execute(update_query, (price_value, img_tag_html, name_value))
                            print(f"Updated: {name_value}, New Price: {price_value}, New Photo: {img_tag_html}")
                        else:
                            print(f"No changes for: {name_value}")
                    else:
                        # No existing record with the same name; insert a new record
                        insert_query = "INSERT INTO hardware (name, price, type, photo) VALUES (%s, %s, %s, %s)"
                        cursor.execute(insert_query, (name_value, price_value, product_type, img_tag_html))
                        print(f"Inserted: {name_value}, Price: {price_value}, Type: {product_type}, Photo: {img_tag_html}")

                # Commit changes to the database
                db.commit()

                # Clean up: Remove records from the database that are not present on the current webpage
                delete_query = "DELETE FROM hardware WHERE name NOT IN ({}) AND type = %s".format(
                    ', '.join(['%s'] * len(name_elements))
                )
                cursor.execute(delete_query, [name_element.text.strip() for name_element in name_elements] + [product_type])
                db.commit()

                # Renumber the IDs
                cursor.execute("SET @counter = 0;")
                cursor.execute("UPDATE hardware SET id = @counter := @counter + 1;")
                db.commit()
                
            else:
                print(f"Name or price elements not found on the web page: {url}")
        else:
            print(f"Failed to retrieve the web page: {url}")

    cursor.close()
    db.close()

except mysql.connector.Error as e:
    print(f"Database Error: {e}")

except mysql.connector.Error as err:
    if err.errno == mysql.connector.errorcode.ER_ACCESS_DENIED_ERROR:
        print("Error: Access denied. Please check your username and password.")
    elif err.errno == mysql.connector.errorcode.ER_BAD_DB_ERROR:
        print("Error: The specified database does not exist.")
    elif err.errno == mysql.connector.errorcode.ER_CONNECT_ERROR:
        print(f"Error: Can't connect to MySQL server on {err.sqlstate}.")
    else:
        print(f"Error: {err}")
finally:
    # Close the database connection in any case, whether it was successful or not
    if 'db' in locals() and db.is_connected():
        db.close()
