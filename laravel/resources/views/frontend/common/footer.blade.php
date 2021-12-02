<footer>
  <section class="footer">
    <div class="firstb">
      <h6>Fale Conosco</h6>
      <p>{{ str_replace(array("<p>", "</p>"),'', $contato->endereco) }}</p>
      <p>9AM - 5PM Segunda - Sexta</p>
      <p>{{ $contato->email }}</p>
    </div>
    <div class="secondb">
      <p><a href="#">Política de Privacidade</a></p>
      <p><a href="#">Termos de Uso</a></p>
      <p><a href="#">Página desenvolvida por Cláudia Brito - Uners Horizon 2022</a></p>
    </div>
  </section>
</footer>