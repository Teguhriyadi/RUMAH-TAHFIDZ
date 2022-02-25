import 'package:flutter/material.dart';
import 'package:tahfidz/LoginPage.dart';
import 'package:tahfidz/dashboard_screen.dart';
// import 'package:tahfidz/login_screen.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: DashboardScreen(),
    ),
  );
}
