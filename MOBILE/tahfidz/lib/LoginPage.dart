import 'package:flutter/material.dart';

// class LoginPage extends StatelessWidget {
//   const LoginPage({Key? key}) : super(key: key);

//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       backgroundColor: Colors.white,
//       body: SingleChildScrollView(
//         child: Container(
//           child: Column(
//             children: <Widget>[
//               Container(
//                 height: 400,
//                 decoration: const BoxDecoration(
//                   image: DecorationImage(
//                       image: AssetImage('assets/images/background.png'),
//                       fit: BoxFit.fill),
//                 ),
//                 child: Stack(
//                   children: <Widget>[
//                     Positioned(
//                       left: 140,
//                       width: 80,
//                       height: 150,
//                       child: Container(
//                         decoration: BoxDecoration(
//                           image: DecorationImage(
//                               image: AssetImage('assets/images/light-1.png'),
//                               fit: BoxFit.fill),
//                         ),
//                       ),
//                     ),
//                     Positioned(
//                       right: 40,
//                       top: 40,
//                       width: 80,
//                       height: 150,
//                       child: Container(
//                         decoration: BoxDecoration(
//                           image: DecorationImage(
//                               image: AssetImage('assets/images/light-1.png'),
//                               fit: BoxFit.fill),
//                         ),
//                       ),
//                     ),
//                     Positioned(
//                       right: 80,
//                       top: 40,
//                       width: 80,
//                       height: 150,
//                       child: Container(
//                         decoration: BoxDecoration(
//                           image: DecorationImage(
//                               image: AssetImage('assets/images/light-1.png'),
//                               fit: BoxFit.fill),
//                         ),
//                       ),
//                     ),
//                     Positioned(
//                       child: Container(
//                         margin: EdgeInsets.only(top: 50),
//                         child: Center(
//                           child: Text(
//                             "Masuk",
//                             style: TextStyle(
//                                 color: Colors.white,
//                                 fontSize: 40,
//                                 fontWeight: FontWeight.bold,
//                                 fontFamily: 'poppins'),
//                           ),
//                         ),
//                       ),
//                     )
//                   ],
//                 ),
//               ),
//             ],
//           ),
//         ),
//       ),
//     );
//   }
// }

class LoginPage extends StatefulWidget {
  const LoginPage({Key? key}) : super(key: key);

  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  bool hide = true;
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.deepPurple,
      body: SingleChildScrollView(
        child: Stack(
          children: [
            Container(
              margin: EdgeInsets.only(top: 400),
              width: double.infinity,
              height: 450,
              decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.only(
                      topRight: Radius.circular(40),
                      topLeft: Radius.circular(40))),
            ),
            Container(
              padding: EdgeInsets.symmetric(horizontal: 20, vertical: 0),
              margin: EdgeInsets.only(top: 200, left: 50, right: 50),
              width: double.infinity,
              height: 400,
              decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(12),
                  boxShadow: [
                    BoxShadow(
                        color: Colors.black38, spreadRadius: 0.1, blurRadius: 5)
                  ]),
              child: Column(
                children: [
                  TextField(
                    decoration: InputDecoration(
                        hintText: "Nomor Telepon",
                        prefixIcon: Icon(Icons.phone),
                        border: OutlineInputBorder(
                            borderRadius: BorderRadius.circular(20))),
                  ),
                ],
              ),
            )
          ],
        ),
      ),
    );
  }
}
