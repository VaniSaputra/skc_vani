<?php
// Convert for kelas_all #1

$string = "
1,'Kata Beregu Junior - Senior Putra',<br>
2,'Kata Beregu Junior - Senior Putri',<br>
3,'Kata Beregu Pemula - Kadet Putra',<br>
4,'Kata Beregu Pemula - Kadet Putri',<br>
5,'Kata Beregu Usia Dini - Pra Pemula Putra',<br>
6,'Kata Beregu Usia Dini - Pra Pemula Putri',<br>
7,'Kata Perorangan Junior Putra',<br>
8,'Kata Perorangan Junior Putri',<br>
9,'Kata Perorangan Kadet Putra',<br>
10,'Kata Perorangan Kadet Putri',<br>
11,'Kata Perorangan Pemula Putra',<br>
12,'Kata Perorangan Pemula Putra Khusus',<br>
13,'Kata Perorangan Pemula Putri',<br>
14,'Kata Perorangan Pemula Putri Khusus',<br>
15,'Kata Perorangan Pra Pemula Putra',<br>
16,'Kata Perorangan Pra Pemula Putra Khusus',<br>
17,'Kata Perorangan Pra Pemula Putri',<br>
18,'Kata Perorangan Pra Pemula Putri Khusus',<br>
19,'Kata Perorangan Pra Usia Dini Putri',<br>
20,'Kata Perorangan Senior Putra',<br>
21,'Kata Perorangan Senior Putri',<br>
22,'Kata Perorangan Usia Dini Putra',<br>
23,'Kata Perorangan Usia Dini Putra Khusus',<br>
24,'Kata Perorangan Usia Dini Putri',<br>
25,'Kata Perorangan Usia Dini Putri Khusus',<br>
26,'Kata Perorangan Veteran II Putra',<br>
27,'Kumite +25 Kg Usia Dini Putri',<br>
28,'Kumite +25 Kg Usia Dini Putri Khusus',<br>
29,'Kumite +30 Kg Pra Pemula Putri',<br>
30,'Kumite +30 Kg Pra Pemula Putri Khusus',<br>
31,'Kumite +30 Kg Usia Dini Putra',<br>
32,'Kumite +30 Kg Usia Dini Putra Khusus',<br>
33,'Kumite +35 Kg Pra Pemula Putra',<br>
34,'Kumite +35 Kg Pra Pemula Putra Khusus',<br>
35,'Kumite +40 Kg Pemula Putri',<br>
36,'Kumite +40 Kg Pemula Putri Khusus',<br>
37,'Kumite +50 Kg Pemula Putra',<br>
38,'Kumite +50 Kg Pemula Putra Khusus',<br>
39,'Kumite +54 Kg Kadet Putri',<br>
40,'Kumite +55 Kg Kadet Putra',<br>
41,'Kumite +59 Kg Junior Putri',<br>
42,'Kumite +63 Kg Kadet Putra',<br>
43,'Kumite +63 Kg Kadet Putra Khusus',<br>
44,'Kumite +75 Kg Senior Putra',<br>
45,'Kumite -25 Kg Usia Dini Putri',<br>
46,'Kumite -25 Kg Usia Dini Putri Khusus',<br>
47,'Kumite -30 Kg Pra Pemula Putri',<br>
48,'Kumite -30 Kg Pra Pemula Putri Khusus',<br>
49,'Kumite -30 Kg Usia Dini Putra',<br>
50,'Kumite -30 Kg Usia Dini Putra Khusus',<br>
51,'Kumite -35 Kg Pemula Putri',<br>
52,'Kumite -35 Kg Pemula Putri Khusus',<br>
53,'Kumite -35 Kg Pra Pemula Putra',<br>
54,'Kumite -35 Kg Pra Pemula Putra Khusus',<br>
55,'Kumite -40 Kg Pemula Putra',<br>
56,'Kumite -40 Kg Pemula Putra Khusus',<br>
57,'Kumite -40 Kg Pemula Putri',<br>
58,'Kumite -45 Kg Pemula Putra',<br>
59,'Kumite -45 Kg Pemula Putra Khusus',<br>
60,'Kumite -47 Kg Kadet Putri',<br>
61,'Kumite -47 Kg Kadet Putri Khusus',<br>
62,'Kumite -48 Kg Junior Putri',<br>
63,'Kumite -50 Kg Pemula Putra',<br>
64,'Kumite -50 Kg Pemula Putra Khusus',<br>
65,'Kumite -52 Kg Kadet Putra',<br>
66,'Kumite -52 Kg Kadet Putra Khusus',<br>
67,'Kumite -53 Kg Junior Putri',<br>
68,'Kumite -54 Kg Kadet Putri',<br>
69,'Kumite -54 Kg Kadet Putri Khusus',<br>
70,'Kumite -55 Kg Junior Putra',<br>
71,'Kumite -55 Kg Senior Putri',<br>
72,'Kumite -57 Kg Kadet Putra',<br>
73,'Kumite -57 Kg Kadet Putra Khusus',<br>
74,'Kumite -59 Kg Junior Putri',<br>
75,'Kumite -60 Kg Senior Putra',<br>
76,'Kumite -61 Kg Junior Putra',<br>
77,'Kumite -63 Kg Kadet Putra',<br>
78,'Kumite -67 Kg Senior Putra',<br>
79,'Kumite -68 Kg Junior Putra',<br>
80,'Kumite -75 Kg Senior Putra',<br>
81,'Kumite -76 Kg Junior Putra',<br>
82,'Kumite Perorangan Veteran I Putra',<br>
83,'Kumite Perorangan Veteran II Putra',<br>
";

$patterns = array(
	'1,','2,','3,','4,','5,','6,','7,','8,','9,','10,','11,','12,','13,','14,','15,','16,','17,','18,','19,','20,','21,','22,','23,','24,','25,','26,','27,','28,','29,','30,','31,','32,','33,','34,','35,','36,','37,','38,','39,','40,','41,','42,','43,','44,','45,','46,','47,','48,','49,','50,','51,','52,','53,','54,','55,','56,','57,','58,','59,','60,','61,','62,','63,','64,','65,','66,','67,','68,','69,','70,','71,','72,','73,','74,','75,','76,','77,','78,','79,','80,','81,','82,','83,'
	);
$replacements = array(
	'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''
	);
echo str_replace($patterns, $replacements, $string);

// str_replace(search, replace, subject)
// Outputs: The quick qux baz jumps over the bazzy qux

// {'',}*83