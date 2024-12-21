# Karel-Bot

**Karel** je virtuální robot, vytvořen pomocí PHP a nebo také JS, který se pohybuje po mřížce 10x10 buněk a vykonává příkazy zadané uživatelem.
<br>
<br>


**Pohyb po mřížce:**

   Karel se pohybuje v jednom ze čtyř směrů: sever (N), jih (S), východ (E), nebo západ (W).
   Příkaz **KROK** posune Karla o jeden nebo více kroků v jeho aktuálním směru, pokud to umožňují hranice mřížky.


**Otáčení:**

   Příkaz **VLEVOBOK** otočí Karla o 90° doleva. Tento příkaz, stejně jako příkaz KROK, lze provést vícekrát za sebou.
   

**Pokládání:**

   Příkaz **POLOZ** umístí na aktuální pozici Karla zadaný symbol nebo i slovo.


**Resetování:**
   
   Příkaz **RESET** vymaže celou mřížku a vrátí Karla zpět na výchozí pozici (levý horní roh mřížky).
<br>
<br>

Všechny příkazy jsou **case-insensitive**.
