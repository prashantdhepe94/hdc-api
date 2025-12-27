pipeline {
    agent any

    environment {
        APP_ENV = 'testing'
    }

    stages {

        stage('Checkout') {
            steps {
                echo 'Checking out code'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }

        stage('Environment Setup') {
            steps {
                sh 'cp .env.example .env || true'
                sh 'php artisan key:generate'
            }
        }

        stage('Config Cache Check') {
            steps {
                sh 'php artisan config:clear'
                sh 'php artisan config:cache'
            }
        }

        stage('Basic Health Check') {
            steps {
                sh 'php artisan --version'
            }
        }

    }

    post {
        failure {
            echo '❌ API CI failed'
        }
        success {
            echo '✅ API CI passed'
        }
    }
}
