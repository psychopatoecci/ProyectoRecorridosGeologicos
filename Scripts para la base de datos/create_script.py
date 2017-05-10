#!/usr/bin/env python
# -*- coding: utf-8 -*-

import openpyxl

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

    for row in rows:
        tupla = [sheet_name]
        if i == 3:
            j = 1
            for cell in row:
                if j > 1:
                    if j < 4:
                        tupla.append(float(cell.value))
                    elif j == 4:
                        tupla.append(int(cell.value))
                    else:
                        tupla.append(str(cell.value))
                j = j + 1

            list_values.append(tupla)
        else:
            i = i + 1

    return list_values


def generate_script(script,list_values):

    for item in list_values:
        pages_id = 'P%dR%d' % (item[3],item[0])
        query = "INSERT INTO pages VALUES ('%s');" % pages_id
        script.write( query + '\n') 
        query = "INSERT INTO map_points VALUES(%d,%d,'%s',%f,%f,'%s');" % (
            item[0], item[3], pages_id, item[1], item[2], item[4])
        script.write( query + '\n') 


script = open('inserciones_mapa.sql','w')
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

