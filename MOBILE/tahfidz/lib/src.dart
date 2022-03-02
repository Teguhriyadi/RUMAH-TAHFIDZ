// // Stack(
// //           alignment: Alignment.center,
// //           children: [
// //             Positioned(
// //               top: 0,
// //               height: 252,
// //               width: widhtBody,
// //               child: Container(
// //                 decoration: const BoxDecoration(
// //                     color: Color.fromARGB(255, 24, 0, 238),
// //                     borderRadius: BorderRadius.only(
// //                         bottomLeft: Radius.circular(50),
// //                         bottomRight: Radius.circular(50))),
// //               ),
// //             ),
// //             Positioned(
// //               top: 100,
// //               width: widhtBody / 1.25,
// //               height: heightBody / 2.7,
// //               child: Card(
// //                 color: Colors.white,
// //                 shape: OutlineInputBorder(
// //                   borderRadius: BorderRadius.circular(35),
// //                   borderSide: BorderSide(
// //                     color: Colors.transparent,
// //                   ),
// //                 ),
// //                 child: Padding(
// //                   padding: EdgeInsets.all(20),
// //                   child: Column(children: const [
// //                     CircleAvatar(
// //                       radius: 50,
// //                       backgroundColor: Colors.green,
// //                       child: CircleAvatar(
// //                         radius: 45,
// //                         backgroundImage: AssetImage('assets/images/avatar.png'),
// //                       ),
// //                     ),
// //                     SizedBox(height: 15),
// //                     Text(
// //                       "Nandang Eka Prasetya",
// //                       style: TextStyle(
// //                         fontSize: 18,
// //                         fontWeight: FontWeight.bold,
// //                       ),
// //                     ),
// //                     SizedBox(height: 10),
// //                     Text(
// //                       "Pengajar",
// //                       style: TextStyle(
// //                         fontSize: 12,
// //                         fontWeight: FontWeight.bold,
// //                       ),
// //                     ),
// //                   ]),
// //                 ),
// //               ),
// //             ), //Hero Section
// //             Positioned(
// //               bottom: 30,
// //               // width: widhtBody / 1.25,
// //               // height: heightBody / 2.5,
// //               child: Container(
// //                 color: Colors.white,
// //                 child: Wrap(
// //                   spacing: 17,
// //                   runSpacing: 17,
// //                   children: [
// //                     ItemMenu(
// //                         title: 'Expend', icon: Icons.home, color: 0xffFED525),
// //                     ItemMenu(
// //                         title: 'Collection',
// //                         icon: Icons.star,
// //                         color: 0xffFD637B),
// //                     ItemMenu(
// //                         title: 'Incomes',
// //                         icon: Icons.monetization_on,
// //                         color: 0xff21CDFF),
// //                     ItemMenu(
// //                         title: 'Sales',
// //                         icon: Icons.show_chart,
// //                         color: 0xff7585F6)
// //                   ],
// //                 ),
// //               ),
// //             )
// //           ],
// //         ),
// GestureDetector(
//           onTap: () {
//             FocusScope.of(context).unfocus();
//           },
//           child: ListView(
//             children: [
//               Text(
//                 "Edit Profile",
//                 style: GoogleFonts.poppins(
//                     fontSize: 24, fontWeight: FontWeight.bold),
//               ),
//               SizedBox(
//                 height: 15,
//               ),
//               Center(
//                 child: Stack(
//                   children: [
//                     Positioned(
//                         bottom: 0,
//                         height: heightBody,
//                         width: widhtBody,
//                         child: Container(
//                           color: Colors.blue,
//                         )),
//                     Card(
//                       shape: OutlineInputBorder(
//                           borderRadius: BorderRadius.circular(199),
//                           borderSide: BorderSide(color: Colors.transparent)),
//                       elevation: 10,
//                       color: Colors.white,
//                       child: ProfilePicture(
//                         sizeAvatar: 130,
//                         sizeBtn: 30,
//                         sizeIcon: 15,
//                       ),
//                     ),
//                   ],
//                 ),
//               ),
//               SizedBox(
//                 height: 35,
//               ),
//               buildTextField(
//                   "Nama Lengkap", "Nandang Eka Prasetya", false, false),
//               buildTextField("Alamat ", "Lohbrner", false, false),
//               buildTextField("Jenis Kelamin", "Laki-Laki", false, false),
//               buildTextField(
//                   "Nomor Telepon", "Nandang Eka Prasetya", false, true),
//               buildTextField("Password", "********", true, false),
//               Row(
//                 mainAxisAlignment: MainAxisAlignment.spaceBetween,
//                 children: [
//                   OutlineButton(
//                     padding: EdgeInsets.symmetric(horizontal: 50),
//                     shape: RoundedRectangleBorder(
//                         borderRadius: BorderRadius.circular(20)),
//                     onPressed: () {},
//                     child: Text("CANCEL",
//                         style: TextStyle(
//                             fontSize: 14,
//                             letterSpacing: 2.2,
//                             color: Colors.black)),
//                   ),
//                   RaisedButton(
//                     onPressed: () {},
//                     color: Colors.blue,
//                     padding: EdgeInsets.symmetric(horizontal: 50),
//                     elevation: 2,
//                     shape: RoundedRectangleBorder(
//                         borderRadius: BorderRadius.circular(20)),
//                     child: Text(
//                       "SAVE",
//                       style: TextStyle(
//                           fontSize: 14,
//                           letterSpacing: 2.2,
//                           color: Colors.white),
//                     ),
//                   )
//                 ],
//               )
//             ],
//           ),
//         ),