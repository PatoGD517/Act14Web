**Notes API**

This project is a simple REST API for managing personal notes. The API allows users to create, read, update, and delete notes. Each note includes a title, author, date/time, body, and classification (e.g., personal, work, school).

Features
Create a new note.
Retrieve all notes or a specific note.
Update existing notes.
Delete notes.
Classification for notes (e.g., personal, work, school).
Data Model
Each note contains the following fields:

id (integer): Unique identifier for the note.
title (string): The title of the note.
author (string): The author of the note.
datetime (datetime): The date and time the note was created/updated.
body (text): The content of the note.
classification (enum): The category of the note (e.g., personal, work, school).
