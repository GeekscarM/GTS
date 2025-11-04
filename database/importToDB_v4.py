import csv
import mysql.connector

def cargar_csv_a_db(archivo_csv, host, usuario, password, base_datos, tabla, columnas):

    mydb = mysql.connector.connect(
        host = host,
        user = usuario,
        password = password,
        database = base_datos)

    mycursor = mydb.cursor()
    #Leear archivo csv
    with open(archivo_csv, 'r', encoding='latin1') as csvfile:
        reader = csv.reader(csvfile)
        next(reader, None)  # Saltar la primera fila (encabezados)

        for row in reader:
            #Construir la consulta SQL
            sql = "INSERT INTO " + tabla + " (" + ', '.join(columnas) + ") VALUES (" + ', '.join('%s' for _ in columnas) + ")"
            # Ejecutar la consulta
            mycursor.execute(sql, row)

    #Confirmar cambios
    mydb.commit()
    print("Datos insertados correctamente")

    #Cerrar conexion
    mycursor.close()
    mydb.close()

#Detalles
#archivo_csv = "employeeList-BJX1"
archivo_csv = r'C:\xampp\htdocs\Proyectos\WHS_VisitLog\database\employeeList-BJX1.csv'
host = "localhost"
usuario = "bjx1-it-dev"
password = "Amzn10!!"
base_datos = "bjx1_whs_visitlog"
tabla = "employees"
columnas = ["employeeID", "login", "name", "manager", "jobTitle", "shift"]


cargar_csv_a_db(archivo_csv, host, usuario, password, base_datos, tabla, columnas)
