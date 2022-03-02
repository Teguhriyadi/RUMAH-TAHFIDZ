import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:sp_util/sp_util.dart';
import 'package:tahfidz/components/item-menu.dart';
import 'package:tahfidz/components/profile_avatar.dart';
import 'package:tahfidz/main.dart';

import '../../../model/profil.dart';

// import 'package:sqflite/sqflite.dart';
// void main() {
//   runApp(GetMaterialApp(
//     home: HomeScreen(),
//   ));
// }
class HomeScreen extends StatefulWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  @override
  Widget build(BuildContext context) {
    final heightBody = MediaQuery.of(context).size.height;
    final widhtBody = MediaQuery.of(context).size.width;

    return Scaffold(
      appBar: AppBar(
        shadowColor: Colors.transparent,
        backgroundColor: Color.fromARGB(255, 24, 0, 238),
        actions: [
          TextButton(
              onPressed: () {
                SpUtil.clear();
                // Navigator.push(context, MaterialPageRoute(builder: (context) => MyAppPage()));
                Get.off(MyAppPage());
              },
              child: Icon(
                Icons.logout,
                color: Colors.white,
              ))
        ],
      ),
      body: SafeArea(
        child: Container(
          height: heightBody,
          width: widhtBody,
          // color: Colors.black26,
          child: Column(
            children: [
              Container(
                height: 400,
                width: widhtBody,
                child: Stack(
                  alignment: Alignment.center,
                  children: [
                    Positioned(
                      top: 0,
                      height: 252,
                      width: widhtBody,
                      child: Container(
                        decoration: const BoxDecoration(
                          color: Color.fromARGB(255, 24, 0, 238),
                          borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(50),
                            bottomRight: Radius.circular(50),
                          ),
                        ),
                      ),
                    ),
                    Positioned(
                      top: 60,
                      width: widhtBody / 1.25,
                      height: heightBody / 2.7,
                      child: Card(
                        color: Colors.white,
                        shape: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(35),
                          borderSide: BorderSide(
                            color: Colors.transparent,
                          ),
                        ),
                        child: Padding(
                          padding: EdgeInsets.all(20),
                          child: Column(
                            children: const [
                              ProfilePicture(
                                  sizeAvatar: 100, sizeBtn: 30, sizeIcon: 18),
                              SizedBox(height: 15),
                              Text(
                                SpUtil.getString("nama", defValue: ''),
                              ),
                              SizedBox(height: 10),
                              Text(
                                "Pengajar",
                                style: TextStyle(
                                  fontSize: 12,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            ],
                          ),
                        ),
                      ),
                    ), //Hero Section
                  ],
                ),
              ),
              Container(
                color: Colors.white,
                child: Wrap(
                  spacing: 17,
                  runSpacing: 17,
                  children: [
                    ItemMenu(
                        title: 'Expend', icon: Icons.home, color: 0xffFED525),
                    ItemMenu(
                        title: 'Collection',
                        icon: Icons.star,
                        color: 0xffFD637B),
                    ItemMenu(
                        title: 'Incomes',
                        icon: Icons.monetization_on,
                        color: 0xff21CDFF),
                    ItemMenu(
                        title: 'Sales',
                        icon: Icons.show_chart,
                        color: 0xff7585F6)
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
