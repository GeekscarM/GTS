#!/usr/bin/env python3.11
from email.message import EmailMessage
from app2 import password
import subprocess
import ssl
import smtplib
import mysql.connector

# Database Connection
mydb = mysql.connector.connect(
    host="localhost", 
    user="bjx1-it-dev",
    password="Amzn10!!",
    database="bjx1_mood"
)

# MySQL Query
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM `records` order by id_record DESC limit 1")
myresult = mycursor.fetchall()

# Query Results Variables Creation
for x in myresult:
    idVisita = x[0]
    login = x[1]
    mood = x[2]
    dateTime = x[3]    
    
print(idVisita)
print(mood)
print(dateTime)

# Email Server Data
email_sender = 'rodriwos.amzn@gmail.com'
email_password = password
email_receiver = 'rodriwos@amazon.com'
subject = 'Prueba de Envío de Correo Electrónico con Python'
body= """
Hola """ + login + """ acaba de visitar la oficina de AMCARE

A continuación te compartimos los datos de su visita

ID Visita: """ + str(idVisita) + """
Login: """ + login + """
Mood: """ + mood + """
Fecha: """ + str(dateTime) + """

Por favor contáctalo a la brevedad.

Gracias."""

em = EmailMessage()
em['From'] = email_sender
em['To'] = email_receiver
em['Subject'] = subject
em.set_content(body)

context = ssl.create_default_context()

with smtplib.SMTP_SSL('smtp.gmail.com', 465, context=context) as smtp:
    smtp.login(email_sender, email_password)
    smtp.sendmail(email_sender, email_receiver, em.as_string())