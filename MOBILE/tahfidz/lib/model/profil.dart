// To parse this JSON data, do
//
//     final profil = profilFromJson(jsonString);

import 'dart:convert';

Profil profilFromJson(Map<String, dynamic> str) => Profil.fromJson(str);

String profilToJson(Profil data) => json.encode(data.toJson());

class Profil {
  Profil({
    required this.message,
    required this.status,
    required this.accessToken,
    required this.tokenType,
    required this.data,
  });

  String message;
  bool status;
  String accessToken;
  String tokenType;
  Data data;

  factory Profil.fromJson(Map<String, dynamic> json) => Profil(
        message: json["message"],
        status: json["status"],
        accessToken: json["access_token"],
        tokenType: json["token_type"],
        data: Data.fromJson(json["data"]),
      );

  Map<String, dynamic> toJson() => {
        "message": message,
        "status": status,
        "access_token": accessToken,
        "token_type": tokenType,
        "data": data.toJson(),
      };
}

class Data {
  Data({
    required this.nama,
    required this.alamat,
    required this.email,
    required this.noHp,
  });

  String nama;
  String alamat;
  String email;
  String noHp;

  factory Data.fromJson(Map<String, dynamic> json) => Data(
        nama: json["nama"],
        alamat: json["alamat"],
        email: json["email"],
        noHp: json["no_hp"],
      );

  Map<String, dynamic> toJson() => {
        "nama": nama,
        "alamat": alamat,
        "email": email,
        "no_hp": noHp,
      };
}
