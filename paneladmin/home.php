<section id="container">
        <div class="row mt">
            <div class="chat-room mt">
                <aside class="mid-side">
                    <div class="chat-room-head">
                        <h3>Universitas Jewepe</h3>

                    </div>
                    <div class="room-desk">
                        <h4 class="text-center">JUMLAH</h4>

                        <div class="room-box">
                            <h5 class="text-primary">Jumlah Mahasiswa</h5>

                            <?php

                            $query = mysqli_query($con, "SELECT COUNT(*) AS hasil FROM mahasiswa where kd_mahasiswa");
                            $nomor = 1;
                            $data = mysqli_fetch_array($query)
                            ?>
                            <h3><?php echo $data['hasil']; ?></h3>

                            <p>Jumlah mahasiswa yang telah melakukan pendaftaran</p>
                        </div>
                        <div class="room-box">
                            <h5 class="text-primary">Jumlah Kursus</h5>
                            <?php

                            $query = mysqli_query($con, "SELECT COUNT(*) AS hasil FROM kategori where id_kategori");
                            $nomor = 1;
                            $data = mysqli_fetch_array($query)
                            ?>
                            <h3><?php echo $data['hasil']; ?></h3>
                            <p>Jumlah kursus yang ada</p>
                        </div>

                    </div>

                </aside>

            </div>

        </div>


    </section>