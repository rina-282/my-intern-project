#!/usr/bin/env python3

import sqlite3
import os
import cgi
import urllib.parse

# Path to the SQLite database
DB_FILE = 'school.db'

# Function to fetch the certificate file path from the database
def get_certificate(student_id):
    conn = sqlite3.connect(DB_FILE)
    cursor = conn.cursor()
    try:
        cursor.execute("SELECT certificate_path FROM students WHERE student_id=?", (student_id,))
        result = cursor.fetchone()
        if result:
            return result[0]  # Return the certificate path
        else:
            return None
    except sqlite3.Error as e:
        return None
    finally:
        conn.close()

# Setup for HTTP response
print("Content-type: text/html\n")

# Parse form data (student ID)
form = cgi.FieldStorage()
student_id = form.getvalue("student_id")

# Fetch the certificate path based on the student ID
certificate_path = get_certificate(student_id)

# Check if certificate was found
if certificate_path and os.path.exists(certificate_path):
    # URL encode the certificate path to ensure it is valid for URLs
    encoded_path = urllib.parse.quote(certificate_path)
    print(f"Certificate file: <a href='{encoded_path}'>Download Here</a>")
else:
    print("<p>Error: Certificate not found for the given student ID.</p>")
