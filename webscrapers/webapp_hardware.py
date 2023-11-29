from bs4 import BeautifulSoup
from selenium import webdriver
import time
import mysql.connector

# List of URLs to scrape elements with the specified class and tag
urls = [
    {
        "url": "https://www.speedcomputers.biz/category/komponenti-za-kompjutri/ssd/",
        "name_tag": "a",
        "name_class": "uk-product-name",
        "price_tag": "span",
        "price_class": "price tm-price uk-price",
        "img_tag": "img",
        "img_class": "uk-product-image uk-responsive-width uk-responsive-height",
        "type": "SSD"
    },
    {
        "url": "https://www.speedcomputers.biz/category/komponenti-za-kompjutri/procesori/",
        "name_tag": "a",
        "name_class": "uk-product-name",
        "price_tag": "span",
        "price_class": "price tm-price uk-price",
        "img_tag": "img",
        "img_class": "uk-product-image uk-responsive-width uk-responsive-height",
        "type": "CPU"
    },
    {
        "url": "https://www.speedcomputers.biz/category/komponenti-za-kompjutri/video-karti/",
        "name_tag": "a",
        "name_class": "uk-product-name",
        "price_tag": "span",
        "price_class": "price tm-price uk-price",
        "img_tag": "img",
        "img_class": "uk-product-image uk-responsive-width uk-responsive-height",
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
        img_tag = url_data.get("img_tag")
        img_class = url_data.get("img_class")
        product_type = url_data["type"]

        # Use Selenium to get the page content and execute JavaScript
        options = webdriver.ChromeOptions()
        options.add_argument('--headless')
        driver = webdriver.Chrome(options=options)
        driver.get(url)
        time.sleep(2)

        # Get the updated page content with JavaScript execution
        page_content = driver.page_source

        # Check if the page content is not empty
        if page_content:
            soup = BeautifulSoup(page_content, 'html.parser')
            name_elements = soup.find_all(name_tag, class_=name_class)
            price_elements = soup.find_all(price_tag, class_=price_class)

            if img_tag and img_class:
                img_elements = soup.find_all(img_tag, class_=img_class)
            else:
                img_elements = []

            if name_elements and price_elements and len(name_elements) == len(price_elements):

                for i in range(len(name_elements)):
                    name_element = name_elements[i]
                    price_element = price_elements[i]

                    # Find all image elements with the specified tag and class
                    img_element = img_elements[i] if i < len(img_elements) else None
                    img_src = img_element.get('src') if img_element else None  # Assuming the source link is in the data-src attribute

                    name_value = name_element.text.strip()
                    price_value = price_element.text.strip()

                    # Your existing database operations here, using img_src
                    select_query = "SELECT id, price, photo FROM hardware WHERE name = %s"
                    cursor.execute(select_query, (name_value,))
                    existing_record = cursor.fetchone()

                    if existing_record:
                        existing_id, existing_price, existing_photo = existing_record
                        if price_value != existing_price or img_src != existing_photo:
                            # Price or photo has changed; update the record
                            update_query = "UPDATE hardware SET price = %s, photo = %s WHERE name = %s"
                            cursor.execute(update_query, (price_value, img_src, name_value))
                            print(f"Updated: {name_value}, New Price: {price_value}, New Photo: {img_src}")
                        else:
                            print(f"No changes for: {name_value}")
                    else:
                        # No existing record with the same name; insert a new record
                        insert_query = "INSERT INTO hardware (name, price, type, photo) VALUES (%s, %s, %s, %s)"
                        cursor.execute(insert_query, (name_value, price_value, product_type, img_src))
                        print(f"Inserted: {name_value}, Price: {price_value}, Type: {product_type}, Photo: {img_src}")

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

except Exception as e:
    print(f"Error: {e}")

finally:
    if 'driver' in locals():
        driver.quit()
    if 'db' in locals() and db.is_connected():
        db.close()
