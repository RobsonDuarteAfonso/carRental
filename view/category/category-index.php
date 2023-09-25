{{ include('header.php', { title: 'Liste de Catégories' }) }}
<main>

    <section>

        <h1>Liste de Catégories</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th colspan="2">
                        <a href="{{ path }}category/create" class="button_add">
                            <span class="material-icons">add</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                {% if categories|length > 0 %}
                    {% for category in categories %}
                
                    <tr>
                        <td>{{ category.name }}</td>
                        <td>{{ category.type }}</td>
                        <td>
                            <a href="{{ path }}category/edit/{{ category.id }}" class="button_edit">
                                <span class="material-icons">create</span>
                            </a>
                        </td>
                        <form action="{{ path }}category/confirm" method="post">
                            <td>
                                <input type="hidden" name="id" value="{{ category.id }}">
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