<?php


class Database
{
    // Statische Methode: Wir brauchen kein Objekt der Klasse, um die Verbindung zu holen.
    public static function connect(): PDO // PHP Data Object -> PDO
    {
        // Konfiguration (Anpassen an XAMPP oder Docker!)
        $host = 'db';
        $db   = 'registrierung_db';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Fehler als Exceptions werfen
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Arrays mit Namen statt Nummern
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Echte Prepared Statements nutzen (Sicherheit!)
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            // Wenn die Verbindung scheitert, brechen wir alles ab.
            die("Datenbank-Verbindung fehlgeschlagen: " . $e->getMessage());
        }

        /**
         * DB Table Users -> FETCH_ASSOC
         * $users = [
         * [
         *  'id' => 1,
         *  'username' => 'testUser'
         *  'password' => 'testPassword',
         *  'created_at' => '2026-01-15 15:29:00'
         *  ],
         * [
         *  'id' => 2,
         *  'username' => 'testUser2'
         *  'password' => 'testPassword2',
         *  'created_at' => '2026-01-15 16:29:00'
         *  ],
         * [
         *  'id' => 3,
         *  'username' => 'testUser3'
         *  'password' => 'testPassword3',
         *  'created_at' => '2026-01-15 17:29:00'
         *  ]
         * ]
         *
         * $users[0]['id'] = 2;
         * $users[0]['username'] = 'testUsername2323';
         */

        /**
         * DB Table Users -> FETCH_NUM
         * $users = [
         * [
         *  '0' => 1,
         *  '1' => 'testUser'
         *  '2' => 'testPassword',
         *  '3' => '2026-01-15 15:29:00'
         *  ],
         * [
         *  '0' => 2,
         *  '1' => 'testUser2'
         *  '2' => 'testPassword2',
         *  '3' => '2026-01-15 16:29:00'
         *  ]
         * ]
         *
         */

        /**
         * DB Table Users -> FETCH_BOTH
         * $users = [
         * [
         *  '0' => 1,
         *  'id' => 1,
         *  '1' => 'testUser'
         *  'username' => 'testUser'
         *  '2' => 'testPassword',
         *  'password' => 'testPassword',
         *  '3' => '2026-01-15 15:29:00'
         *  'created_at' => '2026-01-15 15:29:00'
         *  ]
         * ]
         *
         */

        /**
         * DB Table Users -> FETCH_OBJ => stdClass
         *
         * $user = stdClass (Object) (
         *     'id' => '1',
         *     'username' => 'testUser',
         *     'password' => 'testPassword',
         *      'created_at' => '2026-01-15 15:29:00'
         * )
         *
         * $user->id = 2;
         * $user->username = 'userName2';
         *
         */
    }
}
