{{ include('header.php', { title: "Journal de Bord" }) }}
<main>

    <section>

        <h1>Journal de Bord</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Adresse IP</th>
                    <th>Utilisateur</th>
                    <th>Date</th>
                    <th>Page visitée</th>
                </tr>
            </thead>
            <tbody>
                {% if logs|length > 0 %}
                    {% for log in logs %}
                
                    <tr>
                        <td>{{ log.address_ip }}</td>

                        {% if log.user_id is null %}
                            <td>Guest</td>
                        {% else %}
                            <td>{{ log.name }}</td>
                        {% endif %}

                        <td>{{ log.date }}</td>
                        <td>{{ log.page_visited }}</td>
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