{{ include('header.php', { title: 'Liste de Locations' }) }}
<main>

    <section>

        <h1>Liste de Locations</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Voiture</th>
                    <th>Marque</th>
                    <th>Plaque</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Prix par Jour</th>
                    <th>
                        <a href="{{ path }}rent/create" class="button_add">
                            <span class="material-icons">add</span>
                        </a>
                    </th>
                    {% if session.privilege == 2 %}
                    <th>
                        <a href="{{ path }}rent/createPdf" class="button_pdf">
                            <span class="material-icons">picture_as_pdf</span>
                        </a>
                    </th>
                    {% endif %}
                </tr>
            </thead>
            <tbody>
                {% if rents|length > 0 %}
                    {% for rent in rents %}
                
                    <tr>
                        <td>{{ rent.name }}</td>
                        <td>{{ rent.model }}</td>
                        <td>{{ rent.brand }}</td>
                        <td>{{ rent.license_plate }}</td>
                        <td>{{ rent.start_date_rent ~ " " ~ rent.start_time_rent }}</td>
                        <td>{{ rent.end_date_rent ~ " " ~ rent.end_time_rent }}</td>
                        <td>{{ rent.price_per_day ~ " $" }}</td>

                        {% if session.privilege == 1 %}
                        <td>
                            <a href="{{ path }}rent/edit/{{ rent.user_id }}/{{ rent.car_id }}" class="button_edit">
                                <span class="material-icons">create</span>
                            </a>
                        </td>
                        <form action="{{ path }}rent/confirm" method="post">
                            <td>
                                <input type="hidden" name="user_id" value="{{ rent.user_id }}">
                                <input type="hidden" name="car_id" value="{{ rent.car_id }}">
                                <button type="submit" class="button_remove"><span class="material-icons">delete</span></button>
                            </td>
                        </form> 
                        {% else %}
                        <td colspan="2"></td>
                        {% endif %}
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