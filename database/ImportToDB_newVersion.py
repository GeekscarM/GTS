import datetime
#import openpyxl
import time
import pandas as pd
from sqlalchemy import create_engine
import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb


# Creates the connection to database
engine = create_engine('mysql://bjx1-it-dev:Amzn10!!@localhost/bjx1_whs_visitlog')

# Define source data file path
#file = pd.ExcelFile('data.xlsx')
file = pd.ExcelFile(r'C:\xampp\htdocs\Proyectos\WHS_VisitLog\database\data.xlsx')

# Gets data from every worksheet and creates a dataframe per sheet
dataframe = pd.read_excel(file, 'Diagnostic')

# Print Dataframe as a visual aid for correct execution confirmation
print(dataframe)

# Writes each dataframe into its corresponding database table
dataframe.to_sql('diagnostics', con=engine, if_exists= 'append')