import 'package:flutter/material.dart';

class DashboardScreen extends StatefulWidget {
  const DashboardScreen({Key? key}) : super(key: key);

  @override
  _DashboardScreenState createState() => _DashboardScreenState();
}

class _DashboardScreenState extends State<DashboardScreen> {
  @override
  Widget build(BuildContext context) {
    final heightBody = MediaQuery.of(context).size.height;
    final widhtBody = MediaQuery.of(context).size.width;
    return Scaffold(
      body: SafeArea(
        child: Stack(
          alignment: Alignment.center,
          children: [
            Positioned(
              top: 0,
              height: 252,
              width: widhtBody,
              child: Container(
                decoration: BoxDecoration(
                    color: Color.fromARGB(255, 24, 0, 238),
                    borderRadius: BorderRadius.only(
                        bottomLeft: Radius.circular(50),
                        bottomRight: Radius.circular(50))),
              ),
            ),
            Positioned(
              top: 130,
              width: 350,
              height: 250,
              child: Card(
                color: Colors.white,
                shape: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(35),
                    borderSide: BorderSide(
                      color: Colors.transparent,
                      
                    )),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
