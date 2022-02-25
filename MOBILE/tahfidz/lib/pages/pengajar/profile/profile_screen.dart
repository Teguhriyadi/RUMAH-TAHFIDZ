import 'package:flutter/material.dart';
import 'package:get/get.dart';

class ProfileScreen extends StatelessWidget {
  const ProfileScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: SafeArea(
      left: true,
      right: true,
      top: true,
      bottom: true,
      child: GestureDetector(
        onTap: () {
          FocusScope.of(context).unfocus();
        },
      ),
    ));
  }
}
