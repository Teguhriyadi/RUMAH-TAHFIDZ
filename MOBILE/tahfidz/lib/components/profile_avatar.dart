import 'package:flutter/material.dart';

class ProfilePicture extends StatelessWidget {
  const ProfilePicture({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      height: 115,
      width: 115,
      child: Stack(
        fit: StackFit.expand,
        clipBehavior: Clip.none,
        children: [
          CircleAvatar(
            backgroundImage:AssetImage('assets/images/avatar.png'),
          ),
          Positioned(right: 16,
          bottom: 0, child:SizedBox(height: 45,)
          ),
        ],
      ),
    );
  }
}
