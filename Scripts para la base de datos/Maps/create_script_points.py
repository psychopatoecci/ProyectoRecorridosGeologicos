#!/usr/bin/env python
# -*- coding: utf-8 -*-

import openpyxl


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
                    if j == 2:
                        tupla.append(int(cell.value))
                    elif j == 3:
                        tupla.append(str(cell.value))
                    else:
                        tupla.append(float(cell.value))
                j = j + 1

            list_values.append(tupla)
        else:
            i = i + 1

    return list_values


# Lee el archivo. xlsx y devuelve un arreglo con los datos 
# REQ: Una instancia del documento de consultas y lista de valores
# MOD: Modifica el documento que albergará las consultas
# EFE: N/A
def generate_script(script,list_values):

    # Se itera sobre los valores
	for item in list_values:
	    pages_id = 'P%dR%d' % (item[1],item[0])
	    query = "INSERT INTO pages VALUES ('%s');" % pages_id
	    script.write( query + '\n') 
	    query = "INSERT INTO map_points VALUES(%d,%d,'%s',%f,%f,'%s');" % (
	        	 item[0], item[1], pages_id, item[4], item[3], item[2])
	    script.write( query + '\n') 

print "Working on elements..."
script = open('inserciones_points_pages.sql','w')
script.write('-- Project: A través de la historia geológica \n') 
script.write('-- Update of contents in the DB. \n') 
script.write('\n') 
script.write('USE recorridos_geologicosdb; \n') 
script.write('\n') 
script.write('-- Borramos las tuplas "viejas"\n') 
script.write('TRUNCATE TABLE map_points; \n') 
script.write('\n') 

script.write('-- Recorrido Isla Bolaños \n') 
generate_script(script,read_data("Puntos.xlsx",1))
script.write('\n') 
script.write('-- Recorrido Isla Murcielago \n') 
generate_script(script,read_data("Puntos.xlsx",2))
script.close()

