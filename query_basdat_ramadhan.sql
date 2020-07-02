-->Create TABLESPACE
CREATE TABLESPACE tokosepatu
  datafile 'E:\Database\toko_sepatu.dbf'
  size 30M;


-->create USER
CREATE USER ramadhanputrafalah_07064
  DENTIFIED BY 123
  DEFAULT TABLESPACE tokosepatu
  QUOTA 30M ON tokosepatu


-->Table customer
create table customer_07064
    (
    Id_customer INTEGER not null,
    Nama_customer VARCHAR2(15),
    constraint PK_customer primary key (Id_customer)
    );

create sequence id_customer
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger customer_07064_on_insert
before insert on customer_07064
for each row
begin
select id_customer.nextval
into :new.id_customer
from dual;
end;
/

-->Table barang
create table barang_07064
    (
    Id_barang INTEGER not null,
    Nama_barang VARCHAR2(15),
    Harga_barang NUMBER(9),
    constraint PK_barang primary key (Id_barang)
    );

create sequence Id_barang
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger barang_07064_on_insert
before insert on barang_07064
for each row
begin
select id_barang.nextval
into :new.id_barang
from dual;
end;
/

-->Table Transaksi
ALTER SESSION SET NLS_DATE_FORMAT = 'DD-MON-YYYY HH24:MI:SS';

create table transaksi_07064
    (
    Id_order INTEGER not null,
    Id_customer INTEGER,
    Id_barang INTEGER,
    Tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Qty NUMBER(9),
    Jumlah NUMBER(9),
    Total NUMBER(9),
    Bayar NUMBER(9),
    Kembali NUMBER(9)
    );


alter table transaksi_07064
    add constraint FK_Id_customer FOREIGN KEY (Id_customer)
    references customer_07064(Id_customer)
    add constraint FK_Id_barang FOREIGN KEY (Id_barang)
    references barang_07064(Id_barang);


create sequence id_order
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;


create or replace trigger transaksi_07064_on_insert
before insert on transaksi_07064
for each row
begin
select id_order.nextval
into :new.id_order
from dual;
end;
/