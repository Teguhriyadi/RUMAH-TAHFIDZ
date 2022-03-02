class Profil {
  // final String nama;
  // final String alamat;
  // final String telepon;
  // final String email;
  String? nama;
  String? alamat;
  String? telepon;
  String? email;

  void setNama(String nama) {
    this.nama = nama;
  }

  String? getNama() {
    return this.nama;
  }

  // Profil({
  //   required this.nama,
  //   required this.alamat,
  //   required this.telepon,
  //   required this.email,
  // });

  // factory Profil.fromMap(Map<String, dynamic> map) {
  //   return Profil(
  //       nama: map['nama'],
  //       alamat: map['alamat'],
  //       telepon: map['telepon'],
  //       email: map['email']);
  // }

  // Map<String, dynamic> toMap() {
  //   Map<String, dynamic> map = Map<String, dynamic>();
  //   map['nama'] = this.nama;
  //   map['alamat'] = this.alamat;
  //   map['telepon'] = this.telepon;
  //   map['email'] = this.email;
  //   return map;
  // }

  // String getNama() {
  //   return this.nama;
  // }
}
