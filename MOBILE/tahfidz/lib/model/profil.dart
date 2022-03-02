import 'package:dio/dio.dart';

class Profil {
  Dio dio = new Dio();

  var data = new Map();

  var telepon;
  var nama;
  var keterangan;

  void getData() async {
    Response response;

    response =
        await dio.get('https://rtq-freelance.my.id/api/info_profil/' + telepon);

    nama = response.data['data']['nama'];
    keterangan = response.data['data']['keterangan'];
  }
}
