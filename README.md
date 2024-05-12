The project was created using PHP Laravel framework and ESP 32. The databased to maintaining the data from ESP is using MySQL This project was created with the aim of monitoring the capacity of the trash can with an Ultrasonic sensor to determine the height of the trash can capacity. The data obtained by the Ultrasonic sensor will be sent with ESP 32 to the MySQL database that has been created. Then the values of the data will be sent to the webserver which will be displayed by the Laravel framework. Therefore, before creating this project. Friends are requested to ensure that all components and applications needed are installed and available.

First, to run the project, you need to install XAMPP, Arduino IDE, and Composer to your Computer. After that, you need to install the ESP 32 library into the Arduino IDE. Then make sure that the jquery folder for website display is also installed. The jquery file can be seen in the public/jquery folder.

Then, you need to download the file named "iotproject" and extracted and copy to your folder xampp/htdocs.

After all components and application setup have been successful. The first thing that needs to be done is to change the wifi username and password initialization code according to the your username and password Wifi, then replace the serverName IP in the Arduino code with each friend's static IP. After that, friends are asked to run apache and mysql in the xampp application. After successfully running apache and mysql, the next step is to run the command prompt and enter the following command: 
1. cd /
2. cd xampp
3. cd htdocs
4.  cd iotproject
5. php artisan serve

After doing these commands, the next step is uploading the Arduino IDE code to the ESP32 port. Keep in mind, some computers require port driver installation so that the port cable connected to the ESP is successful. If the file uploading fails, it is most likely that your computer needs to install a port driver. How to install the port driver can be seen through the following youtube link: https://youtu.be/eXF17uDvLj0?si=4HLXWz93gkvIBgEJ

After successfully installing the driver, the last step is uploading the Arduino code to the ESP 32, and running the localhost:8000 webserver to see the dashboard display of the Ultrasonic sensor.

Thank you, Ivan David
