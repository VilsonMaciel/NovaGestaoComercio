<?php if (!empty($avisos['aviso_sucesso']) || !empty($avisos['aviso_erro'])): ?>
    <div class="avisos" aria-live="polite" aria-atomic="true">
        <?php foreach ($avisos['aviso_sucesso'] ?? [] as $aviso): ?>
            <article class="aviso aviso--sucesso" role="status" data-aviso>
                <span><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></span>
                <button class="aviso__fechar" type="button" aria-label="Fechar aviso" data-aviso-fechar>&times;</button>
            </article>
        <?php endforeach; ?>

        <?php foreach ($avisos['aviso_erro'] ?? [] as $aviso): ?>
            <article class="aviso aviso--erro" role="alert" data-aviso>
                <span><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></span>
                <button class="aviso__fechar" type="button" aria-label="Fechar aviso" data-aviso-fechar>&times;</button>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
