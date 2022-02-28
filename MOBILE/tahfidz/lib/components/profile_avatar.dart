import 'package:flutter/material.dart';

class ProfilePicture extends StatelessWidget {
  // const ProfilePicture({Key? key}) : super(key: key);

  final double? sizeAvatar;
  final double? sizeIconAvatar;
  const ProfilePicture({this.sizeAvatar, this.sizeIconAvatar});
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
            right: -16,
            bottom: 0,
            child: SizedBox(
              height: sizeIconAvatar,
              width: sizeIconAvatar,
              child: TextButton(
                style: TextButton.styleFrom(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(50),
                    side: BorderSide(color: Colors.white),
                  ),
                  primary: Colors.white,
                  backgroundColor: Color(0xFFF5F6F9),
                ),
                onPressed: () {},
                child: Icon(
                  Icons.edit,
                  color: Colors.white,
                  size: sizeIconAvatar,
                ),
              ),
            ),
          )
        ],
      ),
    );
  }
}
