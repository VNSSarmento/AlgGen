# 🧮 AlgGEn - Gerador de Exercícios Matemáticos

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)

## 📌 Sobre o Projeto

O **AlgGEn** é uma ferramenta web rápida e intuitiva desenvolvida para automatizar a criação de listas de exercícios matemáticos. Ideal para professores que precisam montar provas ou alunos que desejam praticar, o sistema gera dezenas de questões em segundos, completas com gabarito.

## ⚙️ Funcionalidades

* **Geração Customizada:** Escolha entre Adição, Subtração, Multiplicação e Divisão (ou combine várias).
* **Controle de Volume:** Geração de 1 a 100 questões simultâneas.
* **Níveis de Dificuldade:** Algoritmo dinâmico que ajusta a complexidade dos números (Fácil, Médio, Difícil e Extremo).
* **Visualização Dinâmica:** Pré-visualização das questões na tela com recurso de ocultar/mostrar gabarito ("spoiler").
* **Exportação:** Download imediato da lista gerada em formatos **.TXT** ou **.PDF**.

## 🛠️ Detalhes Técnicos

A aplicação foi desenvolvida no padrão **MVC** utilizando **Laravel**. 
A lógica principal reside no controlador que recebe os parâmetros do formulário (operações, quantidade e dificuldade) e utiliza funções nativas do PHP para randomizar e montar as equações dinamicamente. Os dados gerados são armazenados em sessão (`session`) para permitir a visualização e posterior exportação sem sobrecarregar o banco de dados. O front-end foi desenhado com **Blade Components** e **Tailwind CSS**.

## 🚀 Como executar o projeto localmente

1. Clone o repositório:
   ```bash
   git clone [https://github.com/VNSSarmento/alggen.git](https://github.com/VNSSarmento/alggen.git)
