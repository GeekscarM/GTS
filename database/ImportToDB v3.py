import pandas as pd
import datetime
from sqlalchemy import create_engine
import time
import jinja2
import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb
import openpyxl

# Creates the connection to database
engine = create_engine('mysql://bjx1-it-dev:Amzn10!!@localhost/bjx1_whs_visitlog')

# FUNCTION TO GET CURRENT TIME PARTIALLY, ONLY YEAR, MONTH AND DAY, BUT AS STRING
#reportDate = time.strftime("%Y%m%d")
#reportDate = "20230201"
#reportDate = "20230202"
#reportDate = "20230203"
#reportDate = "20230204"
#reportDate = "20230205"
#reportDate = "20230206"
#reportDate = "20230207"
#reportDate = "20230208"
#reportDate = "20230209"
#reportDate = "20230210"
#reportDate = "20230211"
#reportDate = "20230212"
#reportDate = "20230213"
#reportDate = "20230214"
#reportDate = "20230215"
#reportDate = "20230216"
#reportDate = "20230217"
#reportDate = "20230218"

# Define source data file path
file = pd.ExcelFile(r'C:\xampp\htdocs\Proyectos\WHS_VisitLog\database\data.xlsx')
#file = pd.ExcelFile('02-01.xlsx')
#file = pd.ExcelFile('02-02.xlsx')
#file = pd.ExcelFile('02-03.xlsx')
#file = pd.ExcelFile('02-04.xlsx')
#file = pd.ExcelFile('02-05.xlsx')
#file = pd.ExcelFile('02-06.xlsx')
#file = pd.ExcelFile('02-07.xlsx')
#file = pd.ExcelFile('02-08.xlsx')
#file = pd.ExcelFile('02-09.xlsx')
#file = pd.ExcelFile('02-10.xlsx')
#file = pd.ExcelFile('02-11.xlsx')
#file = pd.ExcelFile('02-12.xlsx')
#file = pd.ExcelFile('02-13.xlsx')
#file = pd.ExcelFile('02-14.xlsx')
#file = pd.ExcelFile('02-15.xlsx')
#file = pd.ExcelFile('02-16.xlsx')
#file = pd.ExcelFile('02-17.xlsx')
#file = pd.ExcelFile('02-18.xlsx')

# Gets data from every worksheet and creates a dataframe per sheet
diagnostico = pd.read_excel(file, 'Diagnostico')
#fullReport = pd.read_excel(file, 'FullReport')
#siteReport = pd.read_excel(file, 'SiteReport')
#employeeView = pd.read_excel(file, 'EmployeeView')
#managerView = pd.read_excel(file, 'ManagerView')

# Add a new Timestamp column to each dataframe
#fullReport['ReportDate'] = reportDate
#siteReport['ReportDate'] = reportDate
#employeeView['ReportDate'] = reportDate
#managerView['ReportDate'] = reportDate

# Print Dataframe as a visual aid for correct execution confirmation
print(diagnostico)
#print(fullReport)
#print(employeeView)
#print(managerView)

# Writes each dataframe into its corresponding database table
diagnostico.to_sql('diagnostico', con=engine, if_exists= 'append')
#fullReport.to_sql('full_report', con=engine, if_exists= 'append')
#siteReport.to_sql('site_report', con=engine, if_exists= 'append')
#employeeView.to_sql('employee_view', con=engine, if_exists= 'append')
#managerView.to_sql('manager_view', con=engine, if_exists= 'append')