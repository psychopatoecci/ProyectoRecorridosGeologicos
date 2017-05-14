#!/usr/bin/env python
# -*- coding: utf-8 -*-

import openpyxl
import MySQLdb


# Lee el archivo. xlsx y devuelve un arreglo con los datos 
# REQ: Nombre del documento y nombre de la hoja
# MOD: N/A
# EFE: N/A
def read_data(name_document, sheet_name):

    # Se abre el archivo .xlsx
    book = openpyxl.load_workbook(name_document, data_only=True)
    # Se lee la pestaña 1: Isla bolaños
    sheet = book.get_sheet_by_name(str(sheet_name))

    # Se obtienen las filas
    rows = sheet.rows

    # Iterador
    i = 1

    # Lista de valores
    list_values = []

    # Se extrae los elementos y se le da formato
    for row in rows:
        tupla = [sheet_name]
        if i == 3:
            j = 1
            for cell in row:
                if j > 1:
                    if j == 2 or j == 6:
                        tupla.append(int(cell.value))
                    else:
                        tupla.append(str(cell.value))
                j = j + 1

            list_values.append(tupla)
        else:
            i = i + 1

    return list_values


def generate_script(script,list_values):

    # Conexion a la base de datos
    db = MySQLdb.connect(host="localhost",   
                         user="user.psychopato",       
                         passwd="PsychopatoECCI$", 
                         db="recorridos_geologicosdb")     

    # Creacion del objeto cursor
    cursor = db.cursor()

    # Se itera sobre los valores
    for item in list_values:
        pages_id = 'P%dR%d' % (item[1],item[0])
        success = False
        inicial_value = 1

        # Se busca el próximo identificador disponible en la base de datos
        while not success:
            if item[4] == "None":
                query = "INSERT INTO contents VALUES(%d,'%s','%s','','%s',%d);" % (
                    	 inicial_value, pages_id, item[3],item[2],item[5])
            else:
                query = "INSERT INTO contents VALUES(%d,'%s','%s','%s','%s',%d);" % (
                         inicial_value, pages_id, item[3], item[4], item[2],item[5])

            # Se comprueba si la consulta es posible con el identificador actual
            try:
                cursor.execute(query)
                success = True
            except MySQLdb.Error, e:
                inicial_value = inicial_value +1
        script.write( query + '\n')

    cursor.close()
    db.commit() 


print "Working on elements..."
script = open('inserciones_points_contents.sql','w')
script.write('-- Project: A través de la historia geológica \n') 
script.write('-- Update of contents in the DB. \n') 
script.write('\n') 
script.write('USE recorridos_geologicosdb; \n') 
script.write('\n') 

script.write('-- Recorrido Isla Bolaños \n') 
generate_script(script,read_data("Elementos_puntos.xlsx",1))
script.write('\n') 
script.write('-- Recorrido Isla Murcielago \n') 
generate_script(script,read_data("Elementos_puntos.xlsx",2))
script.close()

