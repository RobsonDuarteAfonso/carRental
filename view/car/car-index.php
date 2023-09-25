{{ include('header.php', { title: 'Liste de Voitures' }) }}
<main>

    <section>

        <h1>Liste de Voitures</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Modèle</th>
                    <th>Marque</th>
                    <th>Année</th>
                    <th>Plaque</th>
                    <th>Kilométrage</th>
                    <th>Catégorie</th>
                    <th colspan="2">
                        <a href="{{ path }}car/create" class="button_add">
                            <span class="material-icons">add</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                {% if cars|length > 0 %}
                    {% for car in cars %}
                
                    <tr>
                        <td>{{ car.model }}</td>
                        <td>{{ car.brand }}</td>
                        <td>{{ car.year }}</td>
                        <td>{{ car.license_plate }}</td>
                        <td>{{ car.car_mileage }}</td>
                        <td>{{ car.name }}</td>
                        <td>
                            <a href="{{ path }}car/edit/{{ car.id }}" class="button_edit">
                                <span class="material-icons">create</span>
                            </a>
                        </td>
                        <form action="{{ path }}car/confirm" method="post">
                            <td>
                                <input type="hidden" name="id" value="{{ car.id }}">
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