# RaceParticipantFactory

Ver se é possível fazer algo mais elegante. O factory deve fazer cache do participants.

A definition() e o método de criação parecem-me demasiado complexos.

```php
for ($i=0; $i<30; $i++)
    RaceParticipant::factory()->create();
```

# RaceFactory

- Gerar horas "certas"

# Formulário de Registo
- Melhorar a criação de utilizador
- Sugerir o username

# Distritos
- Criar uma classe que lide com o distritos

# Testes

LazilyRefreshDatabase::class não está disponível. Útil para atualizar o Pest.php

- Afinar o que é mostrado (subtitle, ...)
- Adiccionar a possibilidade de não existirem páginas.

## Hero page

- Criar um teste para o Hero Page

# Nomes

- Alterar RaceParticipant to Registrations

# Exceptions

## PairController

Procurar HLD: Caso alguém se tente emparelhar com um corredor do mesmo tipo.