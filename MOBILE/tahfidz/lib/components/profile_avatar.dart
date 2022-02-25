import 'package:flutter/material.dart';
import 'package:get/get.dart';

class ProfilePicture extends StatelessWidget {
  // const ProfilePicture({Key? key}) : super(key: key);

  final double? sizeAvatar;
  final double? sizeBtn;
  final double? sizeIcon;

  const ProfilePicture({this.sizeAvatar, this.sizeBtn, this.sizeIcon});
  @override
  Widget build(BuildContext context) {
    return SizedBox(
      height: sizeAvatar!,
      width: sizeAvatar!,
      child: Stack(
        fit: StackFit.expand,
        clipBehavior: Clip.none,
        children: [
          CircleAvatar(
            backgroundImage: AssetImage("assets/images/avatar.png"),
          ),
          Positioned(
      right: 3,
      bottom: 3,
      child: SizedBox(
        height: sizeBtn,
        width: sizeBtn,
        child: Center(
          child: TextButton(
            style: TextButton.styleFrom(
              shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(50),
                side: BorderSide(color: Colors.white),
              ),
              // primary: Colors.white,
              backgroundColor: Color.fromARGB(255, 15, 75, 255),
            ),
            onPressed: () {Get.to(page)},
            child: Icon(
              Icons.edit,
              color: Colors.white,
              size: sizeIcon,
            ),
          ),
        ),
      ),
    ),
        ],
      ),
    );
  }
}
