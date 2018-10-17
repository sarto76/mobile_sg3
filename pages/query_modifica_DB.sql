use  scuolag_maindb;
drop table if exists lessons;
create table lessons (les_id int primary key auto_increment, les_course int, les_ts varchar(200),les_number int, les_instructor int,les_status int);

insert into lessons(les_course,les_ts,les_number, les_instructor,les_status)  select cou_id,cou_ts_1,1, cou_ins_1,cou_status from courses;
insert into lessons(les_course,les_ts,les_number, les_instructor,les_status)  select cou_id,cou_ts_2,2, cou_ins_2,cou_status from courses;
insert into lessons(les_course,les_ts,les_number, les_instructor,les_status)  select cou_id,cou_ts_3,3, cou_ins_3,cou_status from courses;
insert into lessons(les_course,les_ts,les_number, les_instructor,les_status)  select cou_id,cou_ts_4,4, cou_ins_4,cou_status from courses;
alter table lessons add index corso(les_course);

alter table courses drop column cou_ts_1;
alter table courses drop column cou_ts_2;
alter table courses drop column cou_ts_3;
alter table courses drop column cou_ts_4;
alter table courses drop column cou_ins_1;
alter table courses drop column cou_ins_2;
alter table courses drop column cou_ins_3;
alter table courses drop column cou_ins_4;

alter table courses add index tipo_id(cou_type,cou_id);

drop table if exists application2;
create table application2 (app_id int primary key auto_increment, app_lesson int, app_member int, app_notes text,app_ins varchar(10));
insert into application2 (app_lesson, app_member, app_notes,app_ins) select les_id,a.app_member,a.app_notes,app_ins from lessons l, applications a where l.les_course=a.app_course;

drop table applications;
rename table application2 to applications;


delete from lessons where les_ts="" and les_number=4;

delete from lessons where les_number=3 and les_course in
(select cou_id from courses where cou_type='sam');

alter table courses add index tipo (cou_type);
alter table lessons add index cour (les_course);


drop table if exists license;
create table license (lic_id int primary key auto_increment, lic_cat varchar(200), lic_type varchar(200),lic_text varchar(200));
insert into license (lic_cat,lic_type,lic_text) values ('1','','');
insert into license (lic_cat,lic_type,lic_text) values ('2','B','Cat. B (Auto)');
insert into license (lic_cat,lic_type,lic_text) values ('3','A','');
insert into license (lic_cat,lic_type,lic_text) values ('4','A1','');


drop table if exists member_license;
create table member_license(mem_lic_id int primary key auto_increment,lic_id int, mem_id int, mem_lic_pin varchar(200), mem_lic_ts varchar(200));
insert into member_license(lic_id,mem_id, mem_lic_pin, mem_lic_ts) select mem_lic_cat,mem_id,mem_lic_pin,mem_lic_ts from members;

alter table members drop column mem_lic_cat;
alter table members drop column mem_id;
alter table members drop column mem_lic_pin;
alter table members drop column mem_lic_ts;

alter table applications add column member_license int;
update applications a set member_license= (select mem_lic_id from member_license m where m.mem_id=a.app_member);
alter table applications drop column app_member;
