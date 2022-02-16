<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Surat</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Surat</h1>

        <div class="table-responsive">
            <table class="table table-hover" id="dataQuran">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Surat</th>
                        <th>Terjemahan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        loadQuran();

        function loadQuran() {
            let empTable = document.getElementById("dataQuran").getElementsByTagName("tbody")[0];
            empTable.innerHTML = "";

            $.ajax({
                url: 'https://quranapi.idn.sch.id/surah/',
                type: 'get',
                success: function (response) {
                    let no = 1;
                    for (let key in response.data) {
                        if (response.data.hasOwnProperty(key)) {
                            let val = response.data[key];
                            console.log();
                            let NewRow = empTable.insertRow(-1);
                            let noCell = NewRow.insertCell(0);
                            let suratCell = NewRow.insertCell(1);
                            let terjemahanCell = NewRow.insertCell(2);
                            let aksiCell = NewRow.insertCell(3);

                            noCell.innerHTML = no++;
                            suratCell.innerHTML = val.asma + " ("+val.name+")";
                            terjemahanCell.innerHTML = val.translationId;
                            aksiCell.innerHTML = "<a href='{{ url('al-quran') }}/"+val.number+"' class='btn btn-primary'>Baca Qur'an</a>";
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
