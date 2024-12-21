# Karel-Bot

Karel je virtuální robot vytvořen pomocí PHP a také JS, který se pohybuje po mřížce 10x10 buněk a vykonává příkazy zadané uživatelem.\

1. Pohyb po mřížce:
   Karel se pohybuje v jednom ze čtyř směrů: sever (N), jih (S), východ (E), nebo západ (W).
   Příkaz KROK posune Karla o jeden nebo více kroků v jeho aktuálním směru, pokud to umožňují hranice mřížky.
   
2. Otáčení:
   Příkaz VLEVOBOK otočí Karla o 90° doleva. Tento příkaz, stejně jako příkaz KROK, lze provést vícekrát za sebou.

3. Pokládání
   Příkaz POLOZ umístí na aktuální pozici Karla zadaný symbol nebo i slovo.

4. Resetování
   Příkaz RESET vymaže celou mřížku a vrátí Karla zpět na výchozí pozici (levý horní roh mřížky).

Všechny příkazy jsou case-insensitive.

    
