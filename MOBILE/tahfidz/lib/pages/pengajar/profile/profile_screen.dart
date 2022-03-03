// ignore_for_file: deprecated_member_use
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:http/retry.dart';
import 'package:progress_dialog/progress_dialog.dart';
import 'package:tahfidz/components/constants.dart';
import 'package:tahfidz/components/profile_avatar.dart';
import 'package:http/http.dart' as http;

import 'package:tahfidz/model/profil.dart';

// void main(List<String> args) {
//   runApp(MaterialApp(
//     home: ProfileScreen(),
//   ));
// }

class ProfileScreen extends StatefulWidget {
  final String telepon;
  ProfileScreen({required this.telepon});
  // const ProfileScreen({Key? key}) : super(key: key);

  @override
  _ProfileScreenState createState() => _ProfileScreenState();
}

class _ProfileScreenState extends State<ProfileScreen> {
  bool showPassword = false;
  final _scaffoldKey = GlobalKey<ScaffoldState>();
  TextEditingController _controllerTelepon = new TextEditingController();
  TextEditingController _controllerNama = new TextEditingController();

  @override
  void initState() {
    super.initState();
    getUser();
  }

  getUser() async {
    final client = RetryClient(http.Client());
    try {
      print("Ok");
      ProgressDialog progressDialog = ProgressDialog(context);
      var response = await client.get(Uri.parse(
          // 'http://rtq-freelance.my.id/api/info_profil/' + widget.telepon));
          'http://rtq-freelance.my.id/api/info_profil/000'));
      print(response.body);
      var jsonResponse = jsonDecode(response.body) as Map<String, dynamic>;

      _controllerNama.text = jsonResponse['data']['nama'];
      _controllerTelepon.text = jsonResponse['data']['no_hp'];
    } finally {
      client.close();
    }
  }

  @override
  Widget build(BuildContext context) {
    final heightBody = MediaQuery.of(context).size.height;
    final widhtBody = MediaQuery.of(context).size.width;

    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        title: Text(
          "Profil",
          textAlign: TextAlign.center,
        ),
        backgroundColor: mainColor,
        leading: IconButton(
            icon: Icon(Icons.arrow_back_ios_new),
            onPressed: () {
              Get.back();
            }),
      ),
      backgroundColor: Colors.white,
      body: Stack(
        alignment: Alignment.center,
        children: [
          Positioned(
            top: 0,
            child: Container(
              height: 150,
              width: widhtBody,
              color: mainColor,
              // decoration: BoxDecoration(
              //   borderRadius: BorderRadius.only(
              //     topRight: Radius.circular(40.0),
              //     bottomRight: Radius.circular(40.0),
              //   ),
              // ),
            ),
          ),
          Positioned(
            top: 75,
            child: ProfilePicture(
              sizeAvatar: 150,
              sizeBtn: 50,
              sizeIcon: 20,
              // sizeIcon: 150,
            ),
          ),
          Positioned(
            bottom: 0,
            child: Container(
              width: widhtBody,
              height: 420,
              // color: Colors.green,
              padding: EdgeInsets.all(20),
              child: ListView(
                children: [
                  buildTextField("Nama Lengkap", false, false, _controllerNama),
                  buildTextField("Telepon", false, true, _controllerTelepon),
                  // buildTextField("Nama Lengkap", "Nama", false, false),
                  // buildTextFieldo("Nama Lengkap", "Nama", false, false),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      OutlineButton(
                        padding: EdgeInsets.symmetric(horizontal: 50),
                        shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(20)),
                        onPressed: () {},
                        child: Text("CANCEL",
                            style: TextStyle(
                                fontSize: 14,
                                letterSpacing: 2.2,
                                color: Colors.black)),
                      ),
                      RaisedButton(
                        onPressed: () {
                          print(_controllerTelepon.text);
                          print(_controllerNama.text);
                        },
                        color: Colors.blue,
                        padding: EdgeInsets.symmetric(horizontal: 50),
                        elevation: 2,
                        shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(20)),
                        child: Text(
                          "SAVE",
                          style: TextStyle(
                              fontSize: 14,
                              letterSpacing: 2.2,
                              color: Colors.white),
                        ),
                      )
                    ],
                  ),
                ],
              ),
            ),
          )
        ],
      ),
    );
  }

  Widget buildTextField(String labelText, bool isPasswordTextField, bool type,
      dynamic controller) {
    final typekey = TextInputType.number;
    return Padding(
      padding: const EdgeInsets.only(bottom: 35.0),
      child: TextField(
        controller: controller,
        obscureText: isPasswordTextField ? showPassword : false,
        // ignore: dead_code
        keyboardType: (type == true) ? typekey : null,
        decoration: InputDecoration(
            suffixIcon: isPasswordTextField
                ? IconButton(
                    onPressed: () {
                      setState(() {
                        showPassword = !showPassword;
                      });
                    },
                    icon: Icon(
                      Icons.remove_red_eye,
                      color: Colors.grey,
                    ),
                  )
                : null,
            contentPadding: EdgeInsets.only(bottom: 3),
            labelText: labelText,
            floatingLabelBehavior: FloatingLabelBehavior.always,
            hintStyle: TextStyle(
              fontSize: 16,
              fontWeight: FontWeight.bold,
              color: Colors.black,
            )),
      ),
    );
  }
}
