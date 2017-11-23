# -*- coding: utf-8 -*-
"""
Created on Mon Oct 30 20:03:39 2017

@author: Elliott
"""

import smtplib 
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText 
#importamos librerias para adjuntar
from email.MIMEBase import MIMEBase 
from email import encoders 

addr_to   = 'emardones2016@alu.uct.cl'            #destinatario
addr_from = 'correonumeroprincipal@gmail.com'     #envia

smtp_server = 'smtp.gmail.com:587'                #server GMAIL
smtp_user   = 'correonumeroprincipal@gmail.com'   
smtp_pass   = 'pythoncjava'                       
 
# Construimos el mail
msg = MIMEMultipart() 
msg['To'] = addr_to
msg['From'] = addr_from
msg['Subject'] = 'Prueba'

#texto que se envia
msg.attach(MIMEText('plain es par asolo texto :D:D:D:D:D:D!','plain'))

#archivo que se carga
fp = open('C:\Users\Elliott\Documents\UNIVERSIDAD\SEMESTRE 4\INTERFACES GRAFICAS DE USUARIO\CLAS 5\EJERCICIO_4/hola.txt','rb')
adjunto = MIMEBase('multipart', 'encrypted')
adjunto.set_payload(fp.read()) 
fp.close()  
#lo encriptamos en base64 para enviarlo
encoders.encode_base64(adjunto) 
adjunto.add_header('Content-Disposition', 'attachment', filename='nombre')
msg.attach(adjunto) 

# inicializamos el stmp para hacer el envio
server = smtplib.SMTP(smtp_server)
server.starttls() 
#logeamos con los datos ya seteamos en la parte superior
server.login(smtp_user,smtp_pass)
server.sendmail(addr_from, addr_to, msg.as_string())   # se envia el correo
server.quit()