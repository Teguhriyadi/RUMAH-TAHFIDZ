import 'package:flutter/material.dart';

class ItemMenu extends StatelessWidget {
  final String title;
  final dynamic icon;
  final dynamic color;
  ItemMenu(this.title, this.icon,this.color)
  @override
  Widget build(BuildContext context) {
    final double screenWidth = MediaQuery.of(context).size.width;
    return Container(
      width:(screenWidth -40-17)/2,
      height:(screenWidth -40-17-30)/2,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(10.0),
        color:Color(color),
      ),
      child:Column(),
    );
  }
}


