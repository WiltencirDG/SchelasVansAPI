-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2019-02-21 15:05:48.653

-- tables
-- Table: Rota
CREATE TABLE Rota (
    Sequencia int NOT NULL,
    destino_IdDestino int NOT NULL,
    IdRota int NOT NULL AUTO_INCREMENT,
    CONSTRAINT Rota_pk PRIMARY KEY (IdRota)
);

-- Table: Veiculo
CREATE TABLE Veiculo (
    IdVeiculo int NOT NULL AUTO_INCREMENT,
    Marca varchar(50) NOT NULL,
    Modelo varchar(50) NOT NULL,
    Placa varchar(7) NOT NULL,
    CONSTRAINT Veiculo_pk PRIMARY KEY (IdVeiculo)
);

-- Table: VeiculoMotorista
CREATE TABLE VeiculoMotorista (
    IdMotorista int NOT NULL,
    IdVeiculoMoto int NOT NULL AUTO_INCREMENT,
    IdVeiculo int NOT NULL,
    CONSTRAINT VeiculoMotorista_pk PRIMARY KEY (IdVeiculoMoto)
);

CREATE INDEX fkIdx_181 ON VeiculoMotorista (IdMotorista);

CREATE INDEX fkIdx_184 ON VeiculoMotorista (IdVeiculo);

-- Table: VeiculoPassageiro
CREATE TABLE VeiculoPassageiro (
    IdPassageiro int NOT NULL,
    IdVeiculoPassa int NOT NULL AUTO_INCREMENT,
    IdVeiculo int NOT NULL,
    CONSTRAINT VeiculoPassageiro_pk PRIMARY KEY (IdVeiculoPassa)
);

CREATE INDEX fkIdx_175 ON VeiculoPassageiro (IdPassageiro);

CREATE INDEX fkIdx_178 ON VeiculoPassageiro (IdVeiculo);

-- Table: destino
CREATE TABLE destino (
    IdDestino int NOT NULL AUTO_INCREMENT,
    IdPassageiro int NOT NULL,
    Rua varchar(200) NOT NULL,
    Bairro varchar(200) NOT NULL,
    Numero varchar(5) NOT NULL,
    Complemento varchar(200) NULL,
    CONSTRAINT destino_pk PRIMARY KEY (IdDestino)
);

-- Table: endereco
CREATE TABLE endereco (
    idUser int NOT NULL,
    Idendereco int NOT NULL AUTO_INCREMENT,
    Rua varchar(200) NOT NULL,
    Bairro varchar(200) NOT NULL,
    numero varchar(5) NOT NULL,
    complemento varchar(200) NULL,
    CONSTRAINT endereço_pk PRIMARY KEY (Idendereco)
);

CREATE INDEX fkIdx_119 ON endereco (idUser);

-- Table: motorista
CREATE TABLE motorista (
    IdMotorista int NOT NULL AUTO_INCREMENT,
    idUser int NOT NULL,
    CNH char(11) NOT NULL,
    validadeCNH date NOT NULL,
    dataContratacao datetime NOT NULL,
    CONSTRAINT motorista_pk PRIMARY KEY (IdMotorista)
);

CREATE INDEX fkIdx_143 ON motorista (idUser);

-- Table: passageiro
CREATE TABLE passageiro (
    IdPassageiro int NOT NULL AUTO_INCREMENT,
    idUser int NOT NULL,
    CONSTRAINT passageiro_pk PRIMARY KEY (IdPassageiro)
);

CREATE INDEX fkIdx_146 ON passageiro (idUser);

-- Table: rotaVeiculo
CREATE TABLE rotaVeiculo (
    rotaVeiculoID int NOT NULL AUTO_INCREMENT,
    Veiculo_IdVeiculo int NOT NULL,
    Rota_IdRota int NOT NULL,
    CONSTRAINT rotaVeiculo_pk PRIMARY KEY (rotaVeiculoID)
);

-- Table: usuario
CREATE TABLE usuario (
    idUser int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    dataNas date NOT NULL,
    RG char(9) NOT NULL,
    CPF char(10) NOT NULL,
    data_Cadastro datetime NOT NULL,
    senha varchar(564) NOT NULL,
    CONSTRAINT usuario_pk PRIMARY KEY (idUser)
);

-- foreign keys
-- Reference: FK_119 (table: endereco)
ALTER TABLE endereco ADD CONSTRAINT FK_119 FOREIGN KEY FK_119 (idUser)
    REFERENCES usuario (idUser);

-- Reference: FK_143 (table: motorista)
ALTER TABLE motorista ADD CONSTRAINT FK_143 FOREIGN KEY FK_143 (idUser)
    REFERENCES usuario (idUser);

-- Reference: FK_146 (table: passageiro)
ALTER TABLE passageiro ADD CONSTRAINT FK_146 FOREIGN KEY FK_146 (idUser)
    REFERENCES usuario (idUser);

-- Reference: FK_152 (table: destino)
ALTER TABLE destino ADD CONSTRAINT FK_152 FOREIGN KEY FK_152 (IdPassageiro)
    REFERENCES passageiro (IdPassageiro);

-- Reference: FK_175 (table: VeiculoPassageiro)
ALTER TABLE VeiculoPassageiro ADD CONSTRAINT FK_175 FOREIGN KEY FK_175 (IdPassageiro)
    REFERENCES passageiro (IdPassageiro);

-- Reference: FK_178 (table: VeiculoPassageiro)
ALTER TABLE VeiculoPassageiro ADD CONSTRAINT FK_178 FOREIGN KEY FK_178 (IdVeiculo)
    REFERENCES Veiculo (IdVeiculo);

-- Reference: FK_181 (table: VeiculoMotorista)
ALTER TABLE VeiculoMotorista ADD CONSTRAINT FK_181 FOREIGN KEY FK_181 (IdMotorista)
    REFERENCES motorista (IdMotorista);

-- Reference: FK_184 (table: VeiculoMotorista)
ALTER TABLE VeiculoMotorista ADD CONSTRAINT FK_184 FOREIGN KEY FK_184 (IdVeiculo)
    REFERENCES Veiculo (IdVeiculo);

-- Reference: Rota_destino (table: Rota)
ALTER TABLE Rota ADD CONSTRAINT Rota_destino FOREIGN KEY Rota_destino (destino_IdDestino)
    REFERENCES destino (IdDestino);

-- Reference: rotaVeiculo_Rota (table: rotaVeiculo)
ALTER TABLE rotaVeiculo ADD CONSTRAINT rotaVeiculo_Rota FOREIGN KEY rotaVeiculo_Rota (Rota_IdRota)
    REFERENCES Rota (IdRota);

-- Reference: rotaVeiculo_Veiculo (table: rotaVeiculo)
ALTER TABLE rotaVeiculo ADD CONSTRAINT rotaVeiculo_Veiculo FOREIGN KEY rotaVeiculo_Veiculo (Veiculo_IdVeiculo)
    REFERENCES Veiculo (IdVeiculo);

-- End of file.

