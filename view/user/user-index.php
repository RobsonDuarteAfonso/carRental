{{ include('header.php', { title: 'Liste d'Utilisateurs' }) }}
<main>

    <section>

        <h1>Liste d'Utilisateurs</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Adresse</th>
                    <th>Permis</th>
                    <th>Expiration</th>
                    <th>Type</th>
                    <th colspan="2">
                        <a href="{{ path }}user/create" class="button_add">
                            <span class="material-icons">add</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                {% if users|length > 0 %}
                    {% for user in users %}
                
                    <tr>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.address }}</td>
                        <td>{{ user.driver_license }}</td>
                        <td>{{ user.expiration_date }}</td>
                        <td>{{ user.type }}</td>
                        <td>
                            <a href="{{ path }}user/edit/{{ user.id }}" class="button_edit">
                                <span class="material-icons">create</span>
                            </a>
                        </td>
                        <form action="{{ path }}user/confirm" method="post">
                            <td>
                                <input type="hidden" name="id" value="{{ user.id }}">
                                <button type="submit" class="button_remove"><span class="material-icons">delete</span></button>
                            </td>
                        </form> 
                    </tr>
                    {% endfor %}
                {% else %}
                    <tr>
                        <td class="data_void" colspan="7">Il n'y a aucune donnée à afficher.</td>
                    </tr>
                {% endif %}
              
            </tbody>
        </table>

    </section>

</main>
{{ include('footer.php') }}