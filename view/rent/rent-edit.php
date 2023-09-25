{{ include('header.php', { title: 'Modifier une Location' }) }}
<main>

    <section>

        <h1>Modifier une Location</h1>
        
        <form action="{{ path }}rent/update" method="post">

            <input type="hidden" name="user_id" value="{{ rent.user_id }}">
            <input type="hidden" name="car_id" value="{{ rent.car_id }}">

            <label>Client
                <input type="text" name="name" value="{{ user.name }}" disabled>
            </label>
            <label>Voiture
                <input type="text" name="model" value="{{ car.model ~ ' - ' ~ car.brand ~ ' - ' ~ car.license_plate }}" disabled>
            </label>                    
            <label>Debut
                <input type="date" name="start_date_rent" value="{{ rent.start_date_rent }}">
                <input type="time" name="start_time_rent" value="{{ rent.start_time_rent }}">
            </label>
            <label>Fin
                <input type="date" name="end_date_rent" value="{{ rent.end_date_rent }}">
                <input type="time" name="end_time_rent" value="{{ rent.end_time_rent }}">
            </label>             
            <label>Prix par Jour
                <input type="text" name="price_per_day" value="{{ rent.price_per_day }}">
            </label>

            <div class="buttons">
                <input type="submit" class="button_modifier" value="Modifier">
                <input type="button" class="button_cancel" value="Annuler" onclick="goBack()">
            </div>           

        </form>

    </section>

</main>
{{ include('footer.php') }}