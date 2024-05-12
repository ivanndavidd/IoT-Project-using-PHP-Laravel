#include <Wire.h>
#include <WiFi.h>
#include <HTTPClient.h>

// ---------- set val. untuk wifi ----------//
const char* ssid = "Kost@Jamaludin_Depan"; // untuk mengganti nama wifi
const char* password = "Cikarang2023"; /// untuk mengganti password wifi
// ------------ end ---------------//
// --------- set val. untuk web -------//
const char* serverName = "192.168.0.117";
const int httpPort = 8080; // Port HTTPS
String id_device = "1";
String status_send = "ERR";
// -------------- end --------------//
// Konfigurasi sensor ultrasonik
const int trigPin = 12;
const int echoPin = 13;

void setup() {
  Serial.begin(9600);

  // Inisialisasi pin untuk sensor ultrasonik
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  //Setup Wifi connection
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi ..");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print('.');
  }
  Serial.println("CONNECTED");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  digitalWrite(BUILTIN_LED, HIGH);
}

void loop() {
  cek_koneksi();
  // Baca tinggi tempat sampah dari sensor ultrasonik
  float sensor = bacaTinggi();
  // Konversi tinggi menjadi level
  float level = 100 - ((sensor / 200.0) * 100.0);
  // Tentukan status level
  String status;
  if (level < 40) {
    status = "Sedikit";
  } else if (level >= 40 && level <= 90) {
    status = "Sedang";
  } else {
    status = "Penuh";
  }
  Serial.print("level: ");
  Serial.println(level);
  Serial.print("status: ");
  Serial.println(status);
  delay(1000);
  // Kirim data ke server
  kirimDataKeServer(level, status);
  delay(1000); // Kirim data setiap 10 detik
}

//Fungsi baca tinggi
float bacaTinggi() {
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  return pulseIn(echoPin, HIGH) * 0.034 / 2;
}

//Fungsi kirim data ke server
void kirimDataKeServer(float level, String status) {
  HTTPClient http;

  String url;
  url = "http://" + String(serverName) + "/iotproject/public/simpan/" + String(level) + "/" + String(status);
  
  Serial.println(url);
  // Mengirimkan data ke server
  
  http.begin(url);
  int httpResponseCode = http.GET();
  
  if (httpResponseCode > 0) {
    String response = http.getString();
    Serial.println("Server response: " + response);
  } else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  delay(200);
  http.end();
  delay(1000);
}


void cek_koneksi() {
  if (WiFi.status() != WL_CONNECTED) {
  Serial.println("not connect to webserver");
  }
}
