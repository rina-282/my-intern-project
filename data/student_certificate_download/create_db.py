import sqlite3

# Path to the SQLite database
DB_FILE = 'school.db'

def create_database():
    # Connect to the database (it will create the file if it doesn't exist)
    conn = sqlite3.connect(DB_FILE)
    cursor = conn.cursor()

    # Create the 'students' table
    cursor.execute('''
    CREATE TABLE IF NOT EXISTS students (
        student_id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        certificate_path TEXT NOT NULL
    )
    ''')

    # Commit the changes and close the connection
    conn.commit()
    print("Database and table created successfully.")

def insert_sample_data():
    # Connect to the database
    conn = sqlite3.connect(DB_FILE)
    cursor = conn.cursor()

    # Insert some sample student data (with certificate paths)
    students_data = [
        ('John Doe', 'certificates/john_doe_leaving_certificate.pdf'),
        ('Jane Smith', 'certificates/jane_smith_leaving_certificate.pdf'),
        ('Alice Johnson', 'certificates/alice_johnson_leaving_certificate.pdf'),
        ('Bob Brown', 'certificates/bob_brown_leaving_certificate.pdf')
    ]

    # Insert multiple records into the 'students' table
    cursor.executemany('''
    INSERT INTO students (name, certificate_path)
    VALUES (?, ?)
    ''', students_data)

    # Commit the changes and close the connection
    conn.commit()
    print("Sample data inserted successfully.")

def main():
    create_database()
    insert_sample_data()

if __name__ == '__main__':
    main()
