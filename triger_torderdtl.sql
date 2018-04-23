CREATE TRIGGER `INSERT_CHECKER` AFTER INSERT ON `torderdtl`
 FOR EACH ROW BEGIN
DECLARE m_durasi decimal(15,2) DEFAULT 0;
DECLARE m_namamenurecipe varchar(300);
SELECT durasi INTO m_durasi FROM makanan WHERE KODEMENURECIPE = new.kodemenurecipe;
SELECT namamenurecipe INTO m_namamenurecipe FROM makanan WHERE KODEMENURECIPE = new.kodemenurecipe;

insert into torderchecker VALUES(new.kodelokasi,new.kodetrans,new.tglomzet,new.kodemenurecipe,m_namamenurecipe,"1",new.urutan,new.urutanheader,CURRENT_TIME,CURRENT_TIME + interval m_durasi minute,"00:00:00",m_durasi,"TEST","TEST",0);
END