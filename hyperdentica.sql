create sequence dentists_id_seq
    as integer;

alter sequence dentists_id_seq owner to wekexinyylgjsf;

create sequence table_name_id_seq
    as integer;

alter sequence table_name_id_seq owner to wekexinyylgjsf;

create sequence dentist_details_id_seq
    as integer;

alter sequence dentist_details_id_seq owner to wekexinyylgjsf;

create sequence patient_details_id_seq
    as integer;

alter sequence patient_details_id_seq owner to wekexinyylgjsf;

create type daysoftheweek1 as enum ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

alter type daysoftheweek1 owner to wekexinyylgjsf;

create type daysoftheweek as enum ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

alter type daysoftheweek owner to wekexinyylgjsf;

create table users_roles
(
    id   integer default nextval('dentist_details_id_seq'::regclass) not null
        constraint dentist_details_pkey
            primary key
        unique,
    role varchar(100)                                                not null
        unique
);

alter table users_roles
    owner to wekexinyylgjsf;

alter sequence dentist_details_id_seq owned by users_roles.id;

create table users_details
(
    id      integer default nextval('patient_details_id_seq'::regclass) not null
        constraint patient_details_pkey
            primary key
        unique,
    name    varchar(100)                                                not null,
    surname varchar(100)                                                not null,
    phone   varchar(20)                                                 not null,
    id_role integer                                                     not null
        constraint users_details_users_roles_id_fk
            references users_roles
            on update cascade on delete cascade
);

alter table users_details
    owner to wekexinyylgjsf;

alter sequence patient_details_id_seq owned by users_details.id;

create table users
(
    id              integer default nextval('dentists_id_seq'::regclass) not null
        constraint dentists_pkey
            primary key
        unique,
    email           varchar(255)                                         not null
        constraint dentists_email_key
            unique,
    password        varchar(255)                                         not null
        constraint dentists_password_key
            unique,
    id_user_details integer                                              not null
        unique
        constraint users_users_details_id_fk
            references users_details
            on update cascade on delete cascade
);

alter table users
    owner to wekexinyylgjsf;

alter sequence dentists_id_seq owned by users.id;

create table appointments
(
    id                   integer      default nextval('table_name_id_seq'::regclass) not null
        constraint table_name_pkey
            primary key
        unique,
    date_of_appointment  varchar(100)                                                not null,
    treatment            varchar(255)                                                not null,
    price                varchar(100)                                                not null,
    start_of_appointment time                                                        not null,
    end_of_appointment   time                                                        not null,
    description          varchar(255) default 'No Description'::character varying    not null,
    day_of_week          daysoftheweek,
    id_user_dentist      integer
        constraint appointments_appointments_participants_id_fk
            references users
            on update cascade on delete cascade,
    id_user_patient      integer
        constraint appointments_users_id_fk
            references users
            on update cascade on delete cascade
);

alter table appointments
    owner to wekexinyylgjsf;

alter sequence table_name_id_seq owned by appointments.id;

create view appointmentsui
            (id, date_of_appointment, treatment, price, start_of_appointment, end_of_appointment, description,
             day_of_week, id_user_dentist, id_user_patient)
as
SELECT appointments.id,
       appointments.date_of_appointment,
       appointments.treatment,
       appointments.price,
       appointments.start_of_appointment,
       appointments.end_of_appointment,
       appointments.description,
       appointments.day_of_week,
       appointments.id_user_dentist,
       appointments.id_user_patient
FROM appointments;

alter table appointmentsui
    owner to wekexinyylgjsf;


