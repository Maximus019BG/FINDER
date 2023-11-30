import subprocess

php_file_path = 'index/index.php'

# Run PHP file
result = subprocess.run(['php', php_file_path], capture_output=True, text=True)

# Print the output of the PHP script
print(result.stdout)

# Check for any errors
if result.returncode != 0:
    print(f"Error: {result.stderr}")
