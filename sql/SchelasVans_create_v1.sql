-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2019-03-27 14:03:12.741

-- tables
-- Table: Cidade
CREATE TABLE Cidade (
    CidadeId int NOT NULL,
    CidadeNome varchar(300) NOT NULL,
    CONSTRAINT Cidade_pk PRIMARY KEY (CidadeId)
);

-- Table: Destino
CREATE TABLE Destino (
    DestinoId int NOT NULL,
    DestinoDesc varchar(100) NOT NULL,
    DestinoLogradouro varchar(250) NOT NULL,
    DestinoNum varchar(6) NOT NULL,
    DestinoBairro varchar(100) NOT NULL,
    DestinoCidade int NOT NULL,
    CONSTRAINT Destino_pk PRIMARY KEY (DestinoId)
);

-- Table: Passageiro
CREATE TABLE Passageiro (
    PassageiroId int NOT NULL,
    PassageiroNome varchar(100) NOT NULL,
    PassageiroEmail varchar(150) NOT NULL,
    PassageiroFone varchar(20) NOT NULL,
    PassageiroLogradouro varchar(200) NOT NULL,
    PassageiroNum varchar(6) NOT NULL,
    PassageiroBairro varchar(200) NOT NULL,
    PassageiroCidade int NOT NULL,
    CONSTRAINT Passageiro_pk PRIMARY KEY (PassageiroId)
);

-- Table: Rota
CREATE TABLE Rota (
    RotaId int NOT NULL,
    RotaDesc varchar(100) NOT NULL,
    RotaSeq int NOT NULL,
    DestinoId int NOT NULL,
    CONSTRAINT Rota_pk PRIMARY KEY (RotaId)
);

-- Table: Usuario
CREATE TABLE Usuario (
    UsuarioId int NOT NULL,
    UsuarioEmail varchar(150) NOT NULL,
    UsuarioNome varchar(100) NULL,
    UsuarioSenha varchar(256) NULL,
    CONSTRAINT Usuario_pk PRIMARY KEY (UsuarioId,UsuarioEmail)
);

-- Table: Veiculo
CREATE TABLE Veiculo (
    VeiculoId int NOT NULL,
    VeiculoPlaca varchar(30) NOT NULL,
    VeiculoCor varchar(10) NOT NULL,
    VeiculoModelo varchar(50) NOT NULL,
    VeiculoMarca varchar(50) NOT NULL,
    VeiculoCapacidade int NOT NULL,
    CONSTRAINT Veiculo_pk PRIMARY KEY (VeiculoId)
);

-- Table: passageiroVeiculo
CREATE TABLE passageiroVeiculo (
    PassageiroId int NOT NULL,
    VeiculoId int NOT NULL,
    CONSTRAINT passageiroVeiculo_pk PRIMARY KEY (PassageiroId)
);

-- Table: rotaVeiculo
CREATE TABLE rotaVeiculo (
    VeiculoId int NOT NULL,
    RotaId int NOT NULL,
    CONSTRAINT rotaVeiculo_pk PRIMARY KEY (VeiculoId)
);

-- foreign keys
-- Reference: Destino_Cidade (table: Destino)
ALTER TABLE Destino ADD CONSTRAINT Destino_Cidade FOREIGN KEY Destino_Cidade (DestinoCidade)
    REFERENCES Cidade (CidadeId);

-- Reference: Passageiro_Cidade (table: Passageiro)
ALTER TABLE Passageiro ADD CONSTRAINT Passageiro_Cidade FOREIGN KEY Passageiro_Cidade (PassageiroCidade)
    REFERENCES Cidade (CidadeId);

-- Reference: Rota_Destino (table: Rota)
ALTER TABLE Rota ADD CONSTRAINT Rota_Destino FOREIGN KEY Rota_Destino (DestinoId)
    REFERENCES Destino (DestinoId);

-- Reference: passageiroVeiculo_Passageiro (table: passageiroVeiculo)
ALTER TABLE passageiroVeiculo ADD CONSTRAINT passageiroVeiculo_Passageiro FOREIGN KEY passageiroVeiculo_Passageiro (PassageiroId)
    REFERENCES Passageiro (PassageiroId);

-- Reference: passageiroVeiculo_Veiculo (table: passageiroVeiculo)
ALTER TABLE passageiroVeiculo ADD CONSTRAINT passageiroVeiculo_Veiculo FOREIGN KEY passageiroVeiculo_Veiculo (VeiculoId)
    REFERENCES Veiculo (VeiculoId);

-- Reference: rotaVeiculo_Rota (table: rotaVeiculo)
ALTER TABLE rotaVeiculo ADD CONSTRAINT rotaVeiculo_Rota FOREIGN KEY rotaVeiculo_Rota (RotaId)
    REFERENCES Rota (RotaId);

-- Reference: rotaVeiculo_Veiculo (table: rotaVeiculo)
ALTER TABLE rotaVeiculo ADD CONSTRAINT rotaVeiculo_Veiculo FOREIGN KEY rotaVeiculo_Veiculo (VeiculoId)
    REFERENCES Veiculo (VeiculoId);

-- End of file.

