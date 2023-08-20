<?php



    @$koneksi = mysqli_connect ( "localhost","root","","PGSD" );

    if ( mysqli_connect_errno() ){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }



    function base_url () {

        @$base_url  = 'http://s1.test/';

        return @$base_url;

    }



    function nama_url () {

        @$nama_url  = 'Skripsi';

        return @$nama_url;

    }





    function query ( $query ) {

        global $koneksi;

        $result = mysqli_query ( $koneksi, $query );
        $rows   = [];

            while ( $row = mysqli_fetch_array ( $result ) ) {
                $rows[] = $row;
            }

        return $rows;
        
    }

    function queryid ( $query ) {

        global $koneksi;

            $result = mysqli_query ( $koneksi, $query );
            $row 	= mysqli_fetch_array ( $result );

                $rows[] = $row;

        return $row;

    }

    function queryrow ( $query ) {

        global $koneksi;

            $result = mysqli_query ( $koneksi, $query );
            $row 	= mysqli_num_rows ( $result );

                $rows[] = $row;

        return $row;

    }