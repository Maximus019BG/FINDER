import subprocess

php_file_path = 'index/index.php'

# Run PHP file
result = subprocess.run(['php', php_file_path], capture_output=True, text=True)

# Print the output of the PHP script
print(result.stdout)
# main.py
from app import create_asgi_app

application = create_asgi_app()
# main.py
try:
    from app import create_asgi_app
    application = create_asgi_app()
except Exception as e:
    print(f"Error importing 'main': {e}")
    raise


# Check for any errors
if result.returncode != 0:
    print(f"Error: {result.stderr}")
